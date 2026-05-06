import React, { useState, useEffect } from 'react';
import { useParams, useNavigate } from 'react-router-dom';
import {
  ChevronLeft, Calendar, FileText, User,
  Package, CheckCircle2, ClipboardList,
  ArrowRight, Download, ExternalLink, Loader2,
  Printer
} from 'lucide-react';

const StatBadge = ({ current, total, label, icon: Icon, colorClass }) => {
  const percentage = total > 0 ? (current / total) * 100 : 0;
  const isComplete = current === total && total > 0;

  return (
    <div className="flex flex-col gap-2 p-3 rounded-2xl bg-white/5 border border-white/5">
      <div className="flex justify-between items-center">
        <div className={`p-1.5 rounded-lg ${colorClass} bg-opacity-10 text-opacity-100`}>
          <Icon size={16} className={colorClass.replace('bg-', 'text-')} />
        </div>
        <span className="text-[10px] font-bold text-slate-500 uppercase tracking-widest">{label}</span>
      </div>
      <div className="flex items-end justify-between mt-1">
        <div className="flex items-baseline gap-1">
          <span className="text-xl font-bold text-white">{current}</span>
          <span className="text-sm text-slate-500">/ {total}</span>
        </div>
        {isComplete && <CheckCircle2 size={16} className="text-emerald-500 mb-1" />}
      </div>
      <div className="h-1.5 w-full bg-slate-800 rounded-full overflow-hidden">
        <div
          className={`h-full transition-all duration-1000 ${isComplete ? 'bg-emerald-500' : 'bg-blue-500'}`}
          style={{ width: `${percentage}%` }}
        />
      </div>
    </div>
  );
};

const PatientHistory = () => {
  const { cod_paciente } = useParams();
  const navigate = useNavigate();
  const [data, setData] = useState(null);
  const [loading, setLoading] = useState(true);

  useEffect(() => {
    const fetchHistory = async () => {
      try {
        const apiBase = import.meta.env.VITE_API_URL;
        const response = await fetch(`${apiBase}/paciente_entregas.php?q=${cod_paciente}&cod_paciente=${cod_paciente}`);
        const result = await response.json();
        if (result.status === 'success') {
          setData(result);
        }
      } catch (error) {
        console.error('Error fetching patient history:', error);
      } finally {
        setLoading(false);
      }
    };

    fetchHistory();
  }, [cod_paciente]);

  if (loading) {
    return (
      <div className="flex items-center justify-center py-20">
        <div className="flex flex-col items-center gap-4">
          <Loader2 className="w-10 h-10 text-blue-500 animate-spin" />
          <p className="text-slate-400 font-medium">Cargando historial del paciente...</p>
        </div>
      </div>
    );
  }

  if (!data) return <div className="p-8 text-white">No se pudo cargar la información.</div>;

  return (
    <div className="animate-fade-in">
      {/* Header with Back Button */}
      <div className="flex flex-col lg:flex-row lg:items-center justify-between gap-6 mb-8">
        <div className="flex items-start sm:items-center gap-4 md:gap-6">
          <button
            onClick={() => navigate('/dashboard')}
            className="p-3 bg-white/5 hover:bg-white/10 border border-white/10 rounded-2xl text-slate-400 hover:text-white transition-all shadow-lg shrink-0"
          >
            <ChevronLeft size={24} />
          </button>
          <div className="flex-1 min-w-0">
            <div className="flex items-center gap-2 mb-1">
              <span className="px-2 py-0.5 rounded bg-blue-500/10 text-blue-500 text-[10px] font-bold uppercase tracking-widest">
                Expediente #{cod_paciente}
              </span>
            </div>
            <h1 className="text-2xl md:text-3xl font-extrabold text-white tracking-tight break-words">
              {data.paciente.apellido}, {data.paciente.nombre}
            </h1>
            <div className="flex flex-wrap items-center gap-x-4 gap-y-2 mt-2 text-slate-400 text-sm">
              <span className="flex items-center gap-1.5"><FileText size={14} /> DNI: {data.paciente.documento}</span>
              <span className="hidden sm:inline w-1 h-1 rounded-full bg-slate-700"></span>
              <span className="flex items-center gap-1.5"><ClipboardList size={14} /> Entregas: {data.entregas.length}</span>
            </div>
          </div>
        </div>


        <div className="flex gap-3">
          <button className="flex items-center gap-2 px-5 py-3 bg-blue-600 hover:bg-blue-500 text-white rounded-2xl font-bold transition-all shadow-lg shadow-blue-600/20">
            <ArrowRight size={18} />
            Nueva Entrega
          </button>
        </div>
      </div>

      {/* Stats Overview (Optional) */}
      <div className="grid grid-cols-1 xl:grid-cols-4 gap-6 mb-8">
        {/* Placeholder for overall patient stats if needed */}
      </div>

      {/* History List */}
      <div className="space-y-6">
        <h2 className="text-xl font-bold text-white flex items-center gap-2">
          <Package className="text-blue-500" size={24} />
          Historial de Entregas
        </h2>

        {data.entregas.length === 0 ? (
          <div className="bg-white/5 border border-white/5 rounded-3xl p-20 text-center text-slate-500">
            <Package size={64} className="mx-auto mb-4 opacity-10" />
            <p>Este paciente no registra entregas en el sistema.</p>
          </div>
        ) : (
          <div className="grid grid-cols-1 lg:grid-cols-2 gap-6">
            {data.entregas.map((ent) => (
              <div
                key={ent.nro_factura}
                className="group bg-slate-900/50 hover:bg-slate-900/80 border border-white/5 hover:border-blue-500/30 rounded-3xl p-6 transition-all shadow-xl"
              >
                <div className="flex justify-between items-start mb-6">
                  <div className="flex items-center gap-4">
                    <div className="w-12 h-12 rounded-2xl bg-blue-500/10 flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                      <FileText size={24} />
                    </div>
                    <div>
                      <div className="text-xs font-bold text-slate-500 uppercase tracking-widest mb-0.5">Entrega #{ent.nro_factura}</div>
                      <div className="text-lg font-bold text-white leading-tight">
                        {ent.prestador || 'Prestador no especificado'}
                      </div>
                    </div>
                  </div>
                  <div className="text-right">
                    <div className="text-xs font-bold text-slate-500 uppercase tracking-widest mb-0.5">Fecha</div>
                    <div className="text-white font-medium flex items-center gap-1.5 justify-end">
                      <Calendar size={14} className="text-blue-500" />
                      {ent.fecha}
                    </div>
                  </div>
                </div>

                <div className="grid grid-cols-1 sm:grid-cols-3 gap-4 mb-6">
                  <StatBadge
                    current={ent.stats.recibidos}
                    total={ent.stats.total}
                    label="Recepción"
                    icon={Package}
                    colorClass="bg-blue-500"
                  />
                  <StatBadge
                    current={ent.stats.indicados}
                    total={ent.stats.total}
                    label="Indicación"
                    icon={ClipboardList}
                    colorClass="bg-amber-500"
                  />
                  <StatBadge
                    current={ent.stats.preparados}
                    total={ent.stats.total}
                    label="Preparación"
                    icon={CheckCircle2}
                    colorClass="bg-emerald-500"
                  />
                </div>

                <div className="flex items-center justify-between pt-6 border-t border-white/5">
                  <div className="flex gap-2">
                    <button
                      onClick={() => navigate(`/dashboard/venta/${ent.nro_factura}`)}
                      className="p-2 bg-white/5 hover:bg-white/10 rounded-xl text-slate-400 hover:text-white transition-all group/btn"
                      title="Imprimir / Ver Comprobante"
                    >
                      <Printer size={18} className="group-hover/btn:-translate-y-0.5 transition-transform" />
                    </button>
                    <button
                      onClick={() => navigate(`/dashboard/venta/${ent.nro_factura}`)}
                      className="p-2 bg-white/5 hover:bg-white/10 rounded-xl text-slate-400 hover:text-white transition-all group/btn"
                      title="Ver Detalles"
                    >
                      <ExternalLink size={18} className="group-hover/btn:scale-110 transition-transform" />
                    </button>
                  </div>
                  <div className="flex items-center gap-3">
                    <div className="text-right">
                      <div className="text-[10px] font-bold text-slate-500 uppercase tracking-widest mb-0.5">Receta</div>
                      <div className="text-sm font-bold text-white">#{ent.nro_receta}</div>
                    </div>
                  </div>
                </div>
              </div>
            ))}
          </div>
        )}
      </div>
    </div>
  );
};

export default PatientHistory;
