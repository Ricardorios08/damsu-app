import React, { useState } from 'react';
import { Search, Bell, HelpCircle, Menu } from 'lucide-react';
import PatientSearchModal from './PatientSearchModal';

const Header = ({ user, onMenuClick }) => {
  const [isSearchOpen, setIsSearchOpen] = useState(false);

  return (
    <>
      <header className="bg-slate-900/40 backdrop-blur-md border border-white/5 rounded-2xl p-4 flex items-center justify-between mb-6 shadow-xl">
        <div className="flex items-center gap-4 flex-1">
          <button 
            onClick={onMenuClick}
            className="lg:hidden p-2.5 bg-white/5 hover:bg-white/10 rounded-xl text-slate-400 hover:text-white transition-all"
          >
            <Menu size={20} />
          </button>
          
          <div 
            className="relative w-full max-w-md group cursor-pointer"
            onClick={() => setIsSearchOpen(true)}
          >
            <Search className="absolute left-4 top-1/2 -translate-y-1/2 w-4 h-4 text-slate-500 group-hover:text-blue-500 transition-colors" />
            <div className="w-full bg-slate-950/50 border border-white/5 rounded-xl py-2.5 pl-12 pr-4 text-sm text-slate-500 transition-all group-hover:border-blue-500/30 truncate">
              Buscar pacientes...
            </div>
          </div>
        </div>


        <div className="flex items-center gap-3">
          <button className="p-2.5 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all relative">
            <Bell size={20} />
            <span className="absolute top-2.5 right-2.5 w-2 h-2 bg-blue-500 rounded-full border-2 border-slate-900"></span>
          </button>
          <button className="p-2.5 text-slate-400 hover:text-white hover:bg-white/5 rounded-xl transition-all">
            <HelpCircle size={20} />
          </button>
          <div className="h-8 w-px bg-white/5 mx-2"></div>
          <div className="flex flex-col items-end mr-2">
            <span className="text-xs font-bold text-blue-500 uppercase tracking-wider">
              Sector
            </span>
            <span className="text-sm font-medium text-white">
              {user.rol}
            </span>
          </div>
        </div>
      </header>

      <PatientSearchModal 
        isOpen={isSearchOpen} 
        onClose={() => setIsSearchOpen(false)} 
      />
    </>
  );
};

export default Header;
