import React from 'react';
import { Page, Text, View, Document, StyleSheet, Image, Font } from '@react-pdf/renderer';

// Register fonts if needed
// Font.register({ family: 'Inter', src: 'https://fonts.gstatic.com/s/inter/v12/UcCO3FwrK3iLTeHuS_fvQtMwCp50KnMw2boKoduKmMEVuLyfAZ9hiA.woff2' });

const styles = StyleSheet.create({
  page: {
    padding: 40,
    paddingTop: 60, // Space for header logo
    fontSize: 10,
    fontFamily: 'Helvetica',
    color: '#334155',
  },
  headerImage: {
    position: 'absolute',
    top: 5,
    left: 40,
    right: 40,
    height: 40,
  },
  footerImage: {
    position: 'absolute',
    bottom: 10,
    left: 40,
    right: 40,
    height: 30,
  },
  header: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 30,
    borderBottomWidth: 2,
    borderBottomColor: '#0f172a',
    paddingBottom: 20,
    marginTop: 20,
  },
  logoSection: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  logo: {
    width: 50,
    height: 50,
    marginRight: 10,
  },
  companyName: {
    fontSize: 20,
    fontWeight: 'bold',
    color: '#0f172a',
  },
  titleSection: {
    textAlign: 'right',
  },
  docTitle: {
    fontSize: 24,
    fontWeight: 'bold',
    color: '#0f172a',
    textTransform: 'uppercase',
  },
  docSubtitle: {
    fontSize: 12,
    color: '#3b82f6',
    fontWeight: 'bold',
    marginTop: 5,
  },
  infoGrid: {
    flexDirection: 'row',
    justifyContent: 'space-between',
    marginBottom: 30,
  },
  infoBox: {
    width: '48%',
  },
  infoTitle: {
    fontSize: 8,
    fontWeight: 'bold',
    color: '#94a3b8',
    textTransform: 'uppercase',
    borderBottomWidth: 1,
    borderBottomColor: '#f1f5f9',
    paddingBottom: 3,
    marginBottom: 10,
  },
  patientName: {
    fontSize: 14,
    fontWeight: 'bold',
    color: '#0f172a',
    textTransform: 'uppercase',
    marginBottom: 5,
  },
  infoText: {
    fontSize: 9,
    marginBottom: 3,
  },
  table: {
    marginTop: 20,
  },
  tableHeader: {
    flexDirection: 'row',
    borderBottomWidth: 2,
    borderBottomColor: '#0f172a',
    paddingBottom: 5,
    marginBottom: 5,
  },
  tableRow: {
    flexDirection: 'row',
    borderBottomWidth: 1,
    borderBottomColor: '#f1f5f9',
    paddingVertical: 8,
    alignItems: 'center',
  },
  colCant: { width: '8%', fontWeight: 'bold' },
  colDesc: { width: '45%' },
  colLab: { width: '27%' },
  colPrice: { width: '10%', textAlign: 'right' },
  colTotal: { width: '10%', textAlign: 'right', fontWeight: 'bold' },
  itemTitle: { fontSize: 10, fontWeight: 'bold', color: '#0f172a' },
  itemSubtitle: { fontSize: 8, color: '#64748b', marginTop: 2 },
  totalSection: {
    flexDirection: 'row',
    justifyContent: 'flex-end',
    marginTop: 30,
  },
  totalBox: {
    width: 200,
    backgroundColor: '#0f172a',
    padding: 15,
    borderRadius: 10,
    flexDirection: 'row',
    justifyContent: 'space-between',
    alignItems: 'center',
  },
  totalLabel: {
    color: '#ffffff',
    fontSize: 14,
    fontWeight: 'bold',
    textTransform: 'uppercase',
  },
  totalAmount: {
    color: '#ffffff',
    fontSize: 18,
    fontWeight: 'bold',
  },
  footer: {
    position: 'absolute',
    bottom: 60, // Moved up to make room for footer image
    left: 40,
    right: 40,
    borderTopWidth: 1,
    borderTopColor: '#f1f5f9',
    paddingTop: 10,
    flexDirection: 'row',
    justifyContent: 'space-between',
  },
  obsBox: {
    width: '60%',
    backgroundColor: '#f8fafc',
    padding: 10,
    borderRadius: 5,
  },
  signatureBox: {
    width: '30%',
    borderTopWidth: 1,
    borderTopColor: '#cbd5e1',
    marginTop: 20,
    textAlign: 'center',
    paddingTop: 5,
  },
  signatureLabel: {
    fontSize: 7,
    color: '#94a3b8',
    textTransform: 'uppercase',
  }
});

const VentaPDF = ({ data }) => {
  const { venta, paciente, diagnostico, items } = data;

  return (
    <Document>
      <Page size="A4" style={styles.page}>
        {/* Absolute header and footer logos */}
        <Image src="/images/header_logo.jpg" style={styles.headerImage} />
        <Image src="/images/footer_logo.jpg" style={styles.footerImage} />

        {/* Header content */}
        <View style={styles.header}>
          <View style={styles.logoSection}>
            <Image src="/images/logo.jpg" style={styles.logo} />
            <View>
              <Text style={styles.companyName}>DAMSU</Text>
              <Text style={{ fontSize: 8, color: '#64748b' }}>Asistencia Médico Social Universitaria</Text>
            </View>
          </View>
          <View style={styles.titleSection}>
            <Text style={styles.docTitle}>Comprobante</Text>
            <Text style={styles.docSubtitle}>Entrega #{venta.nro_factura}</Text>
            <Text style={{ marginTop: 5, fontSize: 9 }}>Fecha: {venta.fecha}</Text>
          </View>
        </View>

        {/* Info Grid */}
        <View style={styles.infoGrid}>
          <View style={styles.infoBox}>
            <Text style={styles.infoTitle}>Datos del Paciente</Text>
            <Text style={styles.patientName}>{paciente.apellido}, {paciente.nombre}</Text>
            <Text style={styles.infoText}>DNI: {paciente.documento}</Text>
            <Text style={styles.infoText}>{paciente.calle} {paciente.puerta}, {paciente.localidad}</Text>
            <Text style={styles.infoText}>Tel: {paciente.telefono || 'N/A'}</Text>
          </View>
          <View style={styles.infoBox}>
            <Text style={styles.infoTitle}>Información Médica</Text>
            <Text style={styles.infoText}><Text style={{ fontWeight: 'bold' }}>Diagnóstico:</Text> {diagnostico?.nombre_diagnostico || 'N/A'}</Text>
            <Text style={styles.infoText}><Text style={{ fontWeight: 'bold' }}>Fuente:</Text> {diagnostico?.nombre_fuente || 'N/A'}</Text>
            <Text style={styles.infoText}><Text style={{ fontWeight: 'bold' }}>Registro Tumor:</Text> #{diagnostico?.nro_ficha || 'N/A'}</Text>
            <Text style={styles.infoText}><Text style={{ fontWeight: 'bold' }}>Prestador:</Text> {venta.nombre_prestador || 'DAMSU Central'}</Text>
          </View>
        </View>

        {/* Table */}
        <View style={styles.table}>
          <View style={styles.tableHeader}>
            <Text style={[styles.colCant, { fontSize: 8, color: '#94a3b8' }]}>CANT</Text>
            <Text style={[styles.colDesc, { fontSize: 8, color: '#94a3b8' }]}>DESCRIPCIÓN</Text>
            <Text style={[styles.colLab, { fontSize: 8, color: '#94a3b8' }]}>LABORATORIO / LOTE</Text>
            <Text style={[styles.colPrice, { fontSize: 8, color: '#94a3b8' }]}>UNIT</Text>
            <Text style={[styles.colTotal, { fontSize: 8, color: '#94a3b8' }]}>TOTAL</Text>
          </View>

          {items.map((item, idx) => (
            <View key={idx} style={styles.tableRow}>
              <Text style={styles.colCant}>{item.cantidad}</Text>
              <View style={styles.colDesc}>
                <Text style={styles.itemTitle}>{item.nombre_droga || item.descripcion}</Text>
                <Text style={styles.itemSubtitle}>{item.nombre_comercial_mono || 'Genérico'} - GTIN: {item.gtin}</Text>
              </View>
              <View style={styles.colLab}>
                <Text style={{ fontSize: 9, fontWeight: 'bold' }}>{item.laboratorio_mono || 'N/A'}</Text>
                <Text style={{ fontSize: 7, color: '#64748b', marginTop: 2 }}>Lote: {item.lote} - Vto: {item.mes_lote}/{item.anio_lote}</Text>
              </View>
              <Text style={styles.colPrice}>${parseFloat(item.precio_unitario).toFixed(2)}</Text>
              <Text style={styles.colTotal}>${(item.cantidad * item.precio_unitario).toFixed(2)}</Text>
            </View>
          ))}
        </View>

        {/* Total */}
        <View style={styles.totalSection}>
          <View style={styles.totalBox}>
            <Text style={styles.totalLabel}>Total</Text>
            <Text style={styles.totalAmount}>${parseFloat(venta.neto).toLocaleString()}</Text>
          </View>
        </View>

        {/* Footer */}
        <View style={styles.footer}>
          <View style={styles.obsBox}>
            <Text style={{ fontSize: 7, fontWeight: 'bold', color: '#94a3b8', marginBottom: 5 }}>OBSERVACIONES</Text>
            <Text style={{ fontSize: 8, fontStyle: 'italic' }}>{venta.observaciones || 'Sin observaciones.'}</Text>
          </View>
          <View style={styles.signatureBox}>
            <Text style={styles.signatureLabel}>Firma y Sello del Profesional</Text>
          </View>
        </View>
      </Page>
    </Document>
  );
};

export default VentaPDF;
