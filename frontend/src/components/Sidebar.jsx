import React from 'react';
import { 
  LayoutDashboard, 
  Calendar, 
  Package, 
  FileText, 
  Box, 
  BarChart3, 
  Settings, 
  Users, 
  LogOut,
  ChevronLeft,
  ChevronRight
} from 'lucide-react';

const Sidebar = ({ user, menuItems, handleLogout, collapsed, setCollapsed, isMobileOpen, setIsMobileOpen }) => {
  return (
    <>
      {/* Mobile Overlay */}
      {isMobileOpen && (
        <div 
          className="fixed inset-0 bg-slate-950/80 backdrop-blur-sm z-[100] lg:hidden"
          onClick={() => setIsMobileOpen(false)}
        />
      )}

      <aside className={`
        fixed inset-y-0 left-0 z-[101] lg:relative lg:z-20
        transition-all duration-300 
        ${collapsed ? 'w-20' : 'w-72'} 
        ${isMobileOpen ? 'translate-x-0 w-72' : '-translate-x-full lg:translate-x-0'}
        bg-slate-900/50 backdrop-blur-xl border-r border-white/5 flex flex-col
      `}>
        {/* Collapse Toggle (Desktop only) */}
        <button 
          onClick={() => setCollapsed(!collapsed)}
          className="hidden lg:flex absolute -right-3 top-10 w-6 h-6 bg-blue-600 rounded-full items-center justify-center text-white shadow-lg shadow-blue-600/40 border border-blue-400/20 hover:scale-110 transition-transform"
        >
          {collapsed ? <ChevronRight size={14} /> : <ChevronLeft size={14} />}
        </button>

        {/* Close Button (Mobile only) */}
        <button 
          onClick={() => setIsMobileOpen(false)}
          className="lg:hidden absolute right-4 top-10 p-2 bg-white/5 rounded-xl text-slate-400"
        >
          <ChevronLeft size={20} />
        </button>

        <div className="p-6 mb-4">
          <div className="flex items-center gap-3">
            <div className="w-10 h-10 bg-blue-600 rounded-xl flex items-center justify-center shadow-lg shadow-blue-600/20">
              <LayoutDashboard className="text-white w-6 h-6" />
            </div>
            {(!collapsed || isMobileOpen) && (
              <h2 className="text-xl font-bold text-white tracking-tight animate-fade-in">
                DAMSU <span className="text-blue-500 text-sm">APP</span>
              </h2>
            )}
          </div>
        </div>

        <nav className="flex-1 px-3 space-y-1">
          {menuItems.map((item) => (
            <a
              key={item.name}
              href="#"
              className={`flex items-center gap-3 px-4 py-3 rounded-xl transition-all group hover:bg-white/5 ${(collapsed && !isMobileOpen) ? 'justify-center' : ''}`}
              title={(collapsed && !isMobileOpen) ? item.name : ''}
              onClick={() => setIsMobileOpen(false)}
            >
              <span className="text-slate-400 group-hover:text-blue-500 transition-colors">
                {item.icon}
              </span>
              {(!collapsed || isMobileOpen) && (
                <span className="font-medium text-slate-300 group-hover:text-white transition-colors">
                  {item.name}
                </span>
              )}
            </a>
          ))}
        </nav>

        <div className="p-4 border-t border-white/5">
          <div className={`flex items-center gap-3 p-2 mb-4 bg-white/5 rounded-2xl ${(collapsed && !isMobileOpen) ? 'justify-center' : ''}`}>
            <div className="w-10 h-10 shrink-0 rounded-xl bg-blue-500/20 flex items-center justify-center text-blue-500 font-bold border border-blue-500/20">
              {user.nombre?.charAt(0)}
            </div>
            {(!collapsed || isMobileOpen) && (
              <div className="overflow-hidden animate-fade-in">
                <p className="text-sm font-bold text-white truncate">{user.nombre}</p>
                <p className="text-xs text-slate-500 truncate">{user.rol}</p>
              </div>
            )}
          </div>
          <button
            onClick={handleLogout}
            className={`w-full flex items-center gap-3 px-4 py-3 rounded-xl text-red-400 hover:bg-red-500/10 transition-all group ${(collapsed && !isMobileOpen) ? 'justify-center' : ''}`}
            title={(collapsed && !isMobileOpen) ? 'Salir' : ''}
          >
            <LogOut className="w-5 h-5 group-hover:-translate-x-1 transition-transform" />
            {(!collapsed || isMobileOpen) && <span className="font-semibold">Salir del Sistema</span>}
          </button>
        </div>
      </aside>
    </>
  );
};


export default Sidebar;
