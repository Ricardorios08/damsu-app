import React, { useState, useEffect } from 'react';
import { useNavigate, Outlet } from 'react-router-dom';
import { 
  Calendar, 
  Package, 
  FileText, 
  BarChart3, 
  Settings, 
  Users, 
  Box
} from 'lucide-react';
import Sidebar from '../components/Sidebar';
import Header from '../components/Header';

const Dashboard = () => {
  const [user, setUser] = useState(null);
  const [collapsed, setCollapsed] = useState(false);
  const [isMobileMenuOpen, setIsMobileMenuOpen] = useState(false);
  const navigate = useNavigate();

  useEffect(() => {
    const storedUser = localStorage.getItem('user');
    if (!storedUser) {
      navigate('/');
    } else {
      setUser(JSON.parse(storedUser));
    }
  }, [navigate]);

  const handleLogout = () => {
    localStorage.removeItem('user');
    navigate('/');
  };

  const menuItems = [
    { name: 'Inicio', icon: <Box className="w-5 h-5" />, path: '/dashboard' },
    { name: 'Agenda', icon: <Calendar className="w-5 h-5" />, path: '/dashboard/agenda' },
    { name: 'Depósito', icon: <Package className="w-5 h-5" />, path: '/dashboard/deposito' },
    { name: 'Facturación', icon: <FileText className="w-5 h-5" />, path: '/dashboard/facturacion' },
    { name: 'PROFE', icon: <Box className="w-5 h-5" />, path: '/dashboard/profe' },
    { name: 'Estadística', icon: <BarChart3 className="w-5 h-5" />, path: '/dashboard/estadistica' },
    { name: 'Maestros', icon: <Settings className="w-5 h-5" />, path: '/dashboard/maestros' },
    { name: 'Inventario', icon: <Box className="w-5 h-5" />, path: '/dashboard/inventario' },
    { name: 'Pacientes', icon: <Users className="w-5 h-5" />, path: '/dashboard/pacientes' },
  ];

  if (!user) return null;

  return (
    <div className="flex h-screen bg-slate-950 text-slate-200 overflow-hidden font-sans">
      <Sidebar 
        user={user} 
        menuItems={menuItems} 
        handleLogout={handleLogout} 
        collapsed={collapsed}
        setCollapsed={setCollapsed}
        isMobileOpen={isMobileMenuOpen}
        setIsMobileOpen={setIsMobileMenuOpen}
      />

      <main className="flex-1 flex flex-col p-4 md:p-6 overflow-hidden relative">
        {/* Decorative Background Elements */}
        <div className="absolute top-0 right-0 w-[500px] h-[500px] bg-blue-600/5 blur-[120px] rounded-full pointer-events-none"></div>
        <div className="absolute bottom-0 left-0 w-[500px] h-[500px] bg-purple-600/5 blur-[120px] rounded-full pointer-events-none"></div>

        <Header 
          user={user} 
          onMenuClick={() => setIsMobileMenuOpen(true)}
        />

        {/* Content Area */}
        <div className="flex-1 overflow-y-auto pr-2 custom-scrollbar relative z-10">
           <Outlet context={{ user }} />
        </div>
      </main>
    </div>
  );

};

export default Dashboard;
