import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import { 
  ChevronLeft, Printer, Download, Mail, 
  MapPin, Phone, User, Calendar, 
  FileText, Package, CreditCard, Loader2,
  Stethoscope, Info, X, Eye
} from 'lucide-react';

import { jsPDF } from 'jspdf';
import autoTable from 'jspdf-autotable';

const VentaDetalle = () => {
  const { nro_factura } = useParams();
  const navigate = useNavigate();
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);
  const [showPDF, setShowPDF] = useState(false);
  const [pdfSource, setPdfSource] = useState('fpdf');
  const [pdfUrl, setPdfUrl] = useState(null);

  useEffect(() => {
    const fetchData = async () => {
      try {
        const response = await fetch(`http://192.168.2.166:8888/damsu-app/backend/api/venta_detalle.php?nro_factura=${nro_factura}`);
        const result = await response.json();
        if (result.status === 'success') {
          setData(result);
        }
      } catch (error) {
        console.error('Error fetching venta details:', error);
      } finally {
        setLoading(false);
      }
    };
    fetchData();
  }, [nro_factura]);

  const handleShowFPDF = () => {
    setPdfSource('fpdf');
    setPdfUrl(`http://192.168.2.166:8888/damsu-app/backend/api/pdf/venta_comprobante.php?nro_factura=${nro_factura}`);
    setShowPDF(true);
  };

  const handlePrint = () => {
    window.print();
  };

  const generateJSPDF = async () => {
    if (!data) return;
    const { venta, paciente, diagnostico, items } = data;
    const doc = new jsPDF();
    
    // Header Logos & Text
    try {
      // Load Logo Header
      const headerLogoUrl = '/images/header_logo_solo.jpg';
      const footerLogoUrl = '/images/footer_logo.jpg';
      
      const loadImage = (url) => new Promise((resolve) => {
        const img = new Image();
        img.src = url;
        img.onload = () => resolve(img);
        img.onerror = () => resolve(null);
      });

      const [headerImg, footerImg] = await Promise.all([
        loadImage(headerLogoUrl),
        loadImage(footerLogoUrl)
      ]);

      if (headerImg) {
        doc.addImage(headerImg, 'JPEG', 55, 8, 80, 25);
      }

      if (footerImg) {
        doc.addImage(footerImg, 'JPEG', 15, 275, 180, 12);
      }

      doc.setFontSize(7);
      doc.setTextColor(100);
      doc.text('TRAZABILIDAD\nDE MEDICAMENTOS', 15, 15);
      
      // Right side header
      doc.setFontSize(9);
      doc.setTextColor(0);
      doc.text('COMPROBANTE', 140, 15);
      doc.setFontSize(14);
      doc.setFont('helvetica', 'bold');
      doc.text('ENTREGA', 170, 15);
      
      doc.setFontSize(10);
      doc.setFont('helvetica', 'normal');
      doc.text(`FECHA:`, 145, 25);
      doc.text(`${venta.fecha}`, 170, 25);
      doc.text(`N°:`, 145, 35);
      doc.text(`${venta.nro_factura.toString().padStart(8, '0')}`, 170, 35);
      
      // Horizontal Line
      doc.setDrawColor(200);
      doc.line(10, 45, 200, 45);

      // Patient Section
      doc.setFontSize(9);
      doc.text('Paciente:', 15, 55);
      doc.setFontSize(12);
      doc.setFont('helvetica', 'bold');
      doc.text(`${paciente.apellido}, ${paciente.nombre}`, 40, 55);
      
      doc.setFontSize(9);
      doc.setFont('helvetica', 'normal');
      doc.text('Documento:', 15, 62);
      doc.setFontSize(11);
      doc.setFont('helvetica', 'bold');
      doc.text(`${paciente.documento}`, 40, 62);
      
      doc.setFontSize(9);
      doc.setFont('helvetica', 'normal');
      doc.text('Domicilio:', 15, 69);
      doc.text(`${paciente.calle} ${paciente.puerta}, ${paciente.localidad}`, 40, 69);
      
      doc.text('Nota:', 15, 76);
      doc.text(`${venta.observaciones || ''}`, 40, 76);

      // Right column (Enviado a)
      doc.text('Enviar A:', 120, 62);
      doc.setFont('helvetica', 'bold');
      doc.text(`${venta.enviar_a || 'CENTRAL DAMSU'}`, 140, 62);

      // Items Table
      const tableBody = [];
      items.forEach(item => {
        tableBody.push([
          item.cantidad,
          item.nombre_droga || item.descripcion,
          item.nombre_comercial_mono || '',
          item.lote,
          `${item.mes_lote}/${item.anio_lote}`,
          `$${parseFloat(item.precio_unitario).toFixed(2)}`,
          `$${(item.cantidad * item.precio_unitario).toFixed(2)}`
        ]);
        if (item.gtin) {
          tableBody.push([
            '',
            `GTIN: ${item.gtin}`,
            '',
            '',
            '',
            '',
            `Tot: ${item.cantidad}`
          ]);
        }
      });

      autoTable(doc, {
        startY: 85,
        head: [['CANT', 'DROGA', 'PRESENTACION', 'LOTE', 'VTO', 'UNIT', 'TOTAL']],
        body: tableBody,
        theme: 'plain',
        headStyles: { 
          fillColor: [255, 255, 255], 
          textColor: [0, 0, 0],
          fontSize: 8,
          fontStyle: 'bold',
          lineWidth: 0.1,
          lineColor: [200, 200, 200]
        },
        styles: { fontSize: 8, cellPadding: 2 },
        columnStyles: {
          0: { cellWidth: 15 },
          1: { cellWidth: 60 },
          2: { cellWidth: 40 },
          6: { halign: 'right' }
        },
        didParseCell: function(data) {
          if (data.row.index % 2 !== 0 && items.length > 0) {
            data.cell.styles.fontStyle = 'italic';
            data.cell.styles.textColor = [100, 100, 100];
            data.cell.styles.fontSize = 7;
          }
        }
      });

      // Total Final
      const finalY = (doc).lastAutoTable.finalY + 10;
      doc.setFontSize(14);
      doc.setFont('helvetica', 'bold');
      doc.text(`TOTAL GENERAL: $${parseFloat(venta.neto).toFixed(2)}`, 195, finalY, { align: 'right' });

      // Generate Blob URL and show in modal
      const blob = doc.output('blob');
      const url = URL.createObjectURL(blob);
      setPdfSource('jspdf');
      setPdfUrl(url);
      setShowPDF(true);
    } catch (err) {
      console.error('Error generating PDF:', err);
    }
  };

  if (loading) {
    return (
      <div className="flex items-center justify-center py-20">
        <div className="flex flex-col items-center gap-4">
          <Loader2 className="w-10 h-10 text-blue-500 animate-spin" />
          <p className="text-slate-400 font-medium">Cargando detalles de la entrega...</p>
        </div>
      </div>
    );
  }

  if (!data) return <div className="p-8 text-white">No se pudo cargar la información de la factura #{nro_factura}.</div>;

  const { venta, paciente, diagnostico, items } = data;

  return (
    <div className="animate-fade-in max-w-5xl mx-auto pb-20">
      {/* Header Actions */}
      <div className="flex items-center justify-between mb-8 no-print">
        <button 
          onClick={() => navigate(-1)}
          className="flex items-center gap-2 text-slate-400 hover:text-white transition-colors"
        >
          <ChevronLeft size={20} />
          <span>Volver al historial</span>
        </button>
        <div className="flex gap-3">
          <button 
            onClick={generateJSPDF}
            className="flex items-center gap-2 px-5 py-2.5 bg-green-600 hover:bg-green-500 text-white rounded-2xl font-bold transition-all shadow-lg"
          >
            <Download size={18} />
            jsPDF
          </button>
          <button 
            onClick={handleShowFPDF}
            className="flex items-center gap-2 px-5 py-2.5 bg-slate-800 hover:bg-slate-700 text-white rounded-2xl font-bold transition-all shadow-lg"
          >
            <Eye size={18} />
            Ver FPDF
          </button>
        </div>
      </div>


      {/* PDF Modal */}
      {showPDF && (
        <div className="fixed inset-0 z-[100] flex items-center justify-center p-4 md:p-10">
          <div className="absolute inset-0 bg-slate-950/90 backdrop-blur-md" onClick={() => setShowPDF(false)}></div>
          <div className="bg-slate-900 w-full h-full rounded-[32px] overflow-hidden relative z-10 flex flex-col border border-white/10 shadow-2xl">
            <div className="p-6 border-b border-white/10 flex justify-between items-center bg-slate-900/50">
              <div className="flex items-center gap-4">
                <div className={`w-10 h-10 ${pdfSource === 'jspdf' ? 'bg-green-500/10 text-green-500' : 'bg-blue-500/10 text-blue-500'} rounded-xl flex items-center justify-center`}>
                  <FileText size={20} />
                </div>
                <div>
                  <h3 className="text-white font-bold">Vista Previa {pdfSource === 'jspdf' ? 'jsPDF (Frontend)' : 'FPDF (Backend)'}</h3>
                  <p className="text-slate-500 text-xs uppercase tracking-widest font-bold">Entrega #{venta.nro_factura}</p>
                </div>
              </div>
              <button 
                onClick={() => setShowPDF(false)}
                className="p-3 hover:bg-white/5 rounded-2xl text-slate-500 hover:text-white transition-all"
              >
                <X size={24} />
              </button>
            </div>
            <div className="flex-1 bg-white">
              <iframe 
                src={pdfUrl} 
                className="w-full h-full border-none" 
                title="PDF Preview"
              />
            </div>
          </div>
        </div>
      )}


      {/* Main Document Container */}
      <div className="bg-white text-slate-900 rounded-[32px] shadow-2xl overflow-hidden print:shadow-none print:rounded-none">
        {/* Document Header */}
        <div className="bg-slate-900 p-10 text-white flex justify-between items-start">
          <div>
            <div className="flex items-center gap-3 mb-6">
              <div className="w-12 h-12 bg-blue-500 rounded-2xl flex items-center justify-center">
                <Package size={28} className="text-white" />
              </div>
              <h2 className="text-2xl font-black tracking-tight uppercase">DAMSU - App</h2>
            </div>
            <div className="space-y-1 text-slate-400 text-sm">
              <p>Departamento de Asistencia Médico Social Universitaria</p>
              <p>Mendoza, Argentina</p>
              <p>CUIT: 30-54666531-1</p>
            </div>
          </div>
          <div className="text-right">
            <h1 className="text-4xl font-black mb-2 uppercase tracking-tighter">Comprobante</h1>
            <div className="flex flex-col items-end gap-1">
              <span className="px-3 py-1 bg-blue-500/20 text-blue-400 rounded-lg text-xs font-bold uppercase tracking-widest">Entrega #{venta.nro_factura}</span>
              <span className="text-slate-400 text-sm font-medium mt-2 flex items-center gap-2">
                <Calendar size={14} /> {venta.fecha}
              </span>
            </div>
          </div>
        </div>

        <div className="p-6 md:p-10">
          {/* Info Grid */}
          <div className="grid grid-cols-1 md:grid-cols-2 gap-10 mb-12">
            {/* Patient Info */}
            <div className="space-y-6">
              <h3 className="text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2 flex items-center gap-2">
                <User size={14} className="text-blue-500" /> Datos del Paciente
              </h3>
              <div>
                <p className="text-xl font-black text-slate-900 mb-1 uppercase">{paciente.apellido}, {paciente.nombre}</p>
                <div className="space-y-2">
                  <p className="text-slate-600 flex items-center gap-2 text-sm">
                    <FileText size={14} className="text-slate-400" /> DNI: {paciente.documento}
                  </p>
                  <p className="text-slate-600 flex items-center gap-2 text-sm">
                    <MapPin size={14} className="text-slate-400" /> {paciente.calle} {paciente.puerta}, {paciente.localidad}
                  </p>
                  <p className="text-slate-600 flex items-center gap-2 text-sm">
                    <Phone size={14} className="text-slate-400" /> {paciente.telefono || 'Sin teléfono'}
                  </p>
                </div>
              </div>
            </div>

            {/* Medical Info */}
            <div className="space-y-6">
              <h3 className="text-xs font-bold text-slate-400 uppercase tracking-widest border-b border-slate-100 pb-2 flex items-center gap-2">
                <Stethoscope size={14} className="text-blue-500" /> Información Médica
              </h3>
              <div className="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div className="bg-slate-50 p-4 rounded-2xl">
                  <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Diagnóstico</p>
                  <p className="text-sm font-bold text-slate-800">{diagnostico?.nombre_diagnostico || 'No especificado'}</p>
                </div>
                <div className="bg-slate-50 p-4 rounded-2xl">
                  <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Fuente</p>
                  <p className="text-sm font-bold text-slate-800">{diagnostico?.nombre_fuente || 'No especificado'}</p>
                </div>
                <div className="bg-slate-50 p-4 rounded-2xl">
                  <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Registro Tumor</p>
                  <p className="text-sm font-bold text-slate-800">#{diagnostico?.nro_ficha || 'N/A'}</p>
                </div>
                <div className="bg-slate-50 p-4 rounded-2xl">
                  <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Prestador</p>
                  <p className="text-sm font-bold text-slate-800">{venta.nombre_prestador || 'DAMSU Central'}</p>
                </div>
              </div>
            </div>
          </div>

          {/* Items Table / Cards Responsive */}
          <div className="mb-12">
            {/* Desktop Table View */}
            <div className="hidden md:block overflow-x-auto">
              <table className="w-full min-w-[600px]">
                <thead>
                  <tr className="border-b-2 border-slate-900">
                    <th className="py-4 text-left text-xs font-black uppercase tracking-widest text-slate-400">Cant</th>
                    <th className="py-4 text-left text-xs font-black uppercase tracking-widest text-slate-400">Descripción / Monodroga</th>
                    <th className="py-4 text-left text-xs font-black uppercase tracking-widest text-slate-400">Laboratorio / Lote</th>
                    <th className="py-4 text-right text-xs font-black uppercase tracking-widest text-slate-400">Unitario</th>
                    <th className="py-4 text-right text-xs font-black uppercase tracking-widest text-slate-400">Total</th>
                  </tr>
                </thead>
                <tbody className="divide-y divide-slate-100">
                  {items.map((item, idx) => (
                    <tr key={idx} className="group">
                      <td className="py-6 font-black text-slate-900 text-lg">{item.cantidad}</td>
                      <td className="py-6">
                        <p className="font-bold text-slate-900">{item.nombre_droga || item.descripcion}</p>
                        <div className="flex items-center gap-3 mt-1">
                          <p className="text-xs text-slate-400 font-medium uppercase tracking-tight">{item.nombre_comercial_mono || 'Genérico'}</p>
                          <span className="text-[10px] font-bold bg-blue-50 text-blue-600/70 px-2 py-0.5 rounded-full border border-blue-100 uppercase tracking-tighter">
                            GTIN: {item.gtin || 'N/A'}
                          </span>
                        </div>
                      </td>
                      <td className="py-6">
                        <p className="text-sm font-bold text-slate-700">{item.laboratorio_mono || 'N/A'}</p>
                        <div className="flex gap-4 mt-1">
                          <span className="text-[10px] font-bold bg-slate-100 px-1.5 py-0.5 rounded text-slate-500 uppercase">Lote: {item.lote}</span>
                          <span className="text-[10px] font-bold bg-slate-100 px-1.5 py-0.5 rounded text-slate-500 uppercase">Vto: {item.mes_lote}/{item.anio_lote}</span>
                        </div>
                      </td>
                      <td className="py-6 text-right font-medium text-slate-600">${parseFloat(item.precio_unitario).toLocaleString()}</td>
                      <td className="py-6 text-right font-black text-slate-900">${(item.cantidad * item.precio_unitario).toLocaleString()}</td>
                    </tr>
                  ))}
                </tbody>
              </table>
            </div>

            {/* Mobile Card View */}
            <div className="md:hidden space-y-4">
              {items.map((item, idx) => (
                <div key={idx} className="bg-slate-50 p-6 rounded-[24px] border border-slate-100">
                  <div className="flex justify-between items-start mb-4">
                    <span className="w-10 h-10 bg-slate-900 text-white rounded-xl flex items-center justify-center font-black text-lg">
                      {item.cantidad}
                    </span>
                    <div className="text-right">
                      <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Total Item</p>
                      <p className="text-lg font-black text-slate-900">${(item.cantidad * item.precio_unitario).toLocaleString()}</p>
                    </div>
                  </div>
                  
                  <div className="mb-4">
                    <p className="font-bold text-slate-900 text-lg leading-tight mb-1">{item.nombre_droga || item.descripcion}</p>
                    <p className="text-xs text-blue-500 font-bold uppercase tracking-widest mb-3">{item.nombre_comercial_mono || 'Genérico'}</p>
                    
                    <div className="flex flex-wrap gap-2">
                      <span className="text-[10px] font-bold bg-white px-2 py-1 rounded-lg border border-slate-200 text-slate-500 uppercase">
                        GTIN: {item.gtin || 'N/A'}
                      </span>
                    </div>
                  </div>

                  <div className="grid grid-cols-2 gap-3 pt-4 border-t border-slate-200/50">
                    <div>
                      <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Laboratorio</p>
                      <p className="text-xs font-bold text-slate-700">{item.laboratorio_mono || 'N/A'}</p>
                    </div>
                    <div>
                      <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Lote / Vto</p>
                      <p className="text-xs font-bold text-slate-700">{item.lote} ({item.mes_lote}/{item.anio_lote})</p>
                    </div>
                  </div>
                </div>
              ))}
            </div>
          </div>


          {/* Totals */}
          <div className="flex justify-end pt-10 border-t-2 border-slate-900">
            <div className="w-full max-w-xs space-y-4">
              <div className="flex justify-between items-center text-slate-500">
                <span className="font-bold uppercase tracking-widest text-xs">Subtotal</span>
                <span className="font-bold font-mono">${parseFloat(venta.neto).toLocaleString()}</span>
              </div>
              <div className="flex justify-between items-center text-slate-500">
                <span className="font-bold uppercase tracking-widest text-xs">Bonificación (0%)</span>
                <span className="font-bold font-mono">$0.00</span>
              </div>
              <div className="flex justify-between items-center bg-slate-900 text-white p-6 rounded-3xl mt-6">
                <span className="font-black uppercase tracking-tighter text-xl">Total</span>
                <span className="text-3xl font-black font-mono tracking-tighter">${parseFloat(venta.neto).toLocaleString()}</span>
              </div>
            </div>
          </div>

          {/* Footer Info */}
          <div className="mt-20 flex gap-10 items-start">
            <div className="flex-1 bg-slate-50 p-6 rounded-2xl">
              <h4 className="flex items-center gap-2 text-xs font-bold uppercase tracking-widest text-slate-400 mb-3">
                <Info size={14} className="text-blue-500" /> Observaciones
              </h4>
              <p className="text-sm text-slate-600 italic">
                {venta.observaciones || 'Sin observaciones adicionales para esta entrega.'}
              </p>
            </div>
            <div className="flex-1 text-center pt-10 border-t border-dashed border-slate-300">
              <p className="text-[10px] font-bold text-slate-400 uppercase tracking-widest mb-1">Firma y Sello del Profesional</p>
            </div>
          </div>
        </div>
      </div>
      
      {/* Print styles */}
      <style>{`
        @media print {
          body * {
            visibility: hidden;
          }
          .print-area, .print-area * {
            visibility: visible;
          }
          .print-area {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
          }
          .no-print {
            display: none !important;
          }
          @page {
            margin: 0;
          }
          body {
            background-color: white !important;
          }
        }
      `}</style>
    </div>
  );
};

export default VentaDetalle;

