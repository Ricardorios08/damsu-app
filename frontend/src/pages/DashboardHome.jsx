import React from 'react';
import { 
  Users, 
  Package, 
  Box,
  TrendingUp,
  Clock,
  ArrowUpRight,
  ShieldCheck,
  FileText,
  Settings
} from 'lucide-react';

const DashboardHome = ({ user }) => {
  return (
    <div className="animate-fade-in">
      <div className="mb-8">
        <h1 className="text-3xl font-bold text-white mb-2 tracking-tight">
          Bienvenido, {user.nombre?.split(' ')[0]} 👋
        </h1>
        <p className="text-slate-400">Aquí tienes un resumen de la actividad de hoy en el sector {user.rol}.</p>
      </div>

      {/* Stats Grid */}
      <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <StatCard 
          title="Pacientes en Agenda" 
          value="24" 
          change="+12%" 
          icon={<Users className="text-blue-500" />} 
          color="blue"
        />
        <StatCard 
          title="Pedidos Pendientes" 
          value="08" 
          change="-2" 
          icon={<Package className="text-purple-500" />} 
          color="purple"
        />
        <StatCard 
          title="Trámites PROFE" 
          value="15" 
          change="+5" 
          icon={<Box className="text-emerald-500" />} 
          color="emerald"
        />
        <StatCard 
          title="Facturación Hoy" 
          value="$45k" 
          change="+8.4%" 
          icon={<TrendingUp className="text-orange-500" />} 
          color="orange"
        />
      </div>

      {/* Main Grid */}
      <div className="grid grid-cols-1 xl:grid-cols-3 gap-6">
        {/* Activity Feed */}
        <div className="xl:col-span-2 bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-3xl p-8 shadow-xl">
          <div className="flex items-center justify-between mb-8">
            <h3 className="text-xl font-bold text-white flex items-center gap-2">
              <Clock className="text-blue-500 w-5 h-5" />
              Actividad Reciente
            </h3>
            <button className="text-sm font-semibold text-blue-500 hover:text-blue-400 transition-colors flex items-center gap-1">
              Ver todo <ArrowUpRight size={14} />
            </button>
          </div>
          
          <div className="space-y-6">
            {[1, 2, 3].map((i) => (
              <ActivityItem key={i} />
            ))}
          </div>
        </div>

        {/* Quick Actions / System Info */}
        <div className="space-y-6">
          <div className="bg-gradient-to-br from-blue-600 to-blue-700 rounded-3xl p-8 text-white shadow-xl shadow-blue-600/20 relative overflow-hidden group">
            <div className="absolute top-0 right-0 p-4 opacity-10 group-hover:scale-110 transition-transform">
              <ShieldCheck size={120} />
            </div>
            <h3 className="text-xl font-bold mb-2 relative z-10">Estado del Sistema</h3>
            <p className="text-blue-100/80 text-sm mb-6 relative z-10">Todos los módulos operativos. Última sincronización hace 5 minutos.</p>
            <div className="flex items-center gap-2 bg-white/10 w-fit px-3 py-1 rounded-full text-xs font-bold backdrop-blur-md relative z-10">
              <div className="w-2 h-2 bg-emerald-400 rounded-full animate-pulse"></div>
              CONECTADO
            </div>
          </div>

          <div className="bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-3xl p-8 shadow-xl">
            <h3 className="text-lg font-bold text-white mb-6">Atajos Rápidos</h3>
            <div className="grid grid-cols-2 gap-4">
              <QuickAction icon={<Users />} label="Nuevo Paciente" color="blue" />
              <QuickAction icon={<FileText />} label="Crear Factura" color="purple" />
              <QuickAction icon={<Package />} label="Stock" color="emerald" />
              <QuickAction icon={<Settings />} label="Config" color="slate" />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
};

const StatCard = ({ title, value, change, icon, color }) => {
  const colorClasses = {
    blue: 'bg-blue-500/10 border-blue-500/20 text-blue-500',
    purple: 'bg-purple-500/10 border-purple-500/20 text-purple-500',
    emerald: 'bg-emerald-500/10 border-emerald-500/20 text-emerald-500',
    orange: 'bg-orange-500/10 border-orange-500/20 text-orange-500',
  };

  const badgeClasses = change.startsWith('+') 
    ? 'bg-emerald-500/10 text-emerald-500' 
    : 'bg-red-500/10 text-red-500';

  return (
    <div className="bg-slate-900/40 backdrop-blur-md border border-white/5 p-6 rounded-3xl shadow-xl hover:bg-white/5 transition-all group">
      <div className="flex items-start justify-between mb-4">
        <div className={`p-3 rounded-2xl border transition-transform group-hover:scale-110 ${colorClasses[color] || ''}`}>
          {icon}
        </div>
        <span className={`text-xs font-bold px-2 py-1 rounded-full ${badgeClasses}`}>
          {change}
        </span>
      </div>
      <h4 className="text-slate-500 text-sm font-medium mb-1">{title}</h4>
      <p className="text-3xl font-bold text-white">{value}</p>
    </div>
  );
};

const ActivityItem = () => (
  <div className="flex gap-4 p-4 rounded-2xl hover:bg-white/5 transition-all cursor-pointer group">
    <div className="w-12 h-12 rounded-xl bg-slate-800 flex items-center justify-center border border-white/5 group-hover:border-blue-500/30 transition-colors">
      <FileText className="text-slate-400 group-hover:text-blue-500" />
    </div>
    <div className="flex-1">
      <div className="flex items-center justify-between mb-1">
        <h4 className="font-bold text-white text-sm">Actualización de Receta</h4>
        <span className="text-[10px] text-slate-500 font-bold uppercase tracking-widest">Hace 12m</span>
      </div>
      <p className="text-xs text-slate-400">El paciente Juan Perez ha actualizado su documentación oncológica.</p>
    </div>
  </div>
);

const QuickAction = ({ icon, label, color }) => (
  <button className="flex flex-col items-center justify-center p-4 rounded-2xl bg-slate-800/50 border border-white/5 hover:border-blue-500/50 hover:bg-blue-500/5 transition-all gap-2 group">
    <div className={`text-slate-400 group-hover:text-blue-500 transition-colors`}>
      {React.cloneElement(icon, { size: 20 })}
    </div>
    <span className="text-[10px] font-bold text-slate-500 group-hover:text-white uppercase tracking-tight">{label}</span>
  </button>
);

export default DashboardHome;
