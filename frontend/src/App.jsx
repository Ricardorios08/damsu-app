import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Login from './pages/Login';
import Dashboard from './pages/Dashboard';
import DashboardHome from './pages/DashboardHome';
import PatientHistory from './pages/PatientHistory';
import VentaDetalle from './pages/VentaDetalle';

function App() {
  return (
    <Router>
      <Routes>
        <Route path="/" element={<Login />} />
        <Route path="/dashboard" element={<Dashboard />}>
          <Route index element={<DashboardHomeWrapper />} />
          <Route path="patient/:cod_paciente" element={<PatientHistory />} />
          <Route path="venta/:nro_factura" element={<VentaDetalle />} />
        </Route>
      </Routes>
    </Router>
  );
}

const DashboardHomeWrapper = () => {
  const user = JSON.parse(localStorage.getItem('user'));
  return <DashboardHome user={user} />;
};

export default App;
