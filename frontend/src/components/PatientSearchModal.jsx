import React, { useState, useEffect, useRef } from 'react';
import { Search, X, User, FileText, Calendar, ChevronRight, Loader2 } from 'lucide-react';
import { useNavigate } from 'react-router-dom';

const PatientSearchModal = ({ isOpen, onClose }) => {
  const [query, setQuery] = useState('');
  const [results, setResults] = useState([]);
  const [loading, setLoading] = useState(false);
  const inputRef = useRef(null);
  const navigate = useNavigate();

  useEffect(() => {
    if (isOpen) {
      setTimeout(() => inputRef.current?.focus(), 100);
    }
  }, [isOpen]);

  useEffect(() => {
    const searchPatients = async () => {
      if (query.length < 3) {
        setResults([]);
        return;
      }

      setLoading(true);
      try {
        const response = await fetch(`http://192.168.2.166:8888/damsu-app/backend/api/pacientes.php?q=${encodeURIComponent(query)}`);
        const data = await response.json();
        setResults(Array.isArray(data) ? data : []);
      } catch (error) {
        console.error('Error searching patients:', error);
      } finally {
        setLoading(false);
      }
    };

    const debounceTimer = setTimeout(searchPatients, 300);
    return () => clearTimeout(debounceTimer);
  }, [query]);

  const handlePatientSelect = (patient) => {
    onClose();
    navigate(`/dashboard/patient/${patient.cod_paciente}`);
  };

  if (!isOpen) return null;

  return (
    <div className="fixed inset-0 z-50 flex items-start justify-center pt-20 p-4">
      <div className="absolute inset-0 bg-slate-950/80 backdrop-blur-sm animate-fade-in" onClick={onClose}></div>
      
      <div className="w-full max-w-2xl bg-slate-900 border border-white/10 rounded-3xl shadow-2xl overflow-hidden relative z-10 animate-fade-in">
        {/* Search Header */}
        <div className="p-4 border-b border-white/5 flex items-center gap-4">
          <Search className="text-slate-500 w-6 h-6" />
          <input
            ref={inputRef}
            type="text"
            placeholder="Buscar por Apellido, Nombre o Documento..."
            className="flex-1 bg-transparent border-none text-white text-lg focus:outline-none placeholder:text-slate-600"
            value={query}
            onChange={(e) => setQuery(e.target.value)}
          />
          <button 
            onClick={onClose}
            className="p-2 hover:bg-white/5 rounded-full text-slate-500 hover:text-white transition-colors"
          >
            <X size={20} />
          </button>
        </div>

        {/* Results Area */}
        <div className="max-h-[60vh] overflow-y-auto custom-scrollbar">
          {loading ? (
            <div className="p-12 flex flex-col items-center justify-center text-slate-500">
              <Loader2 className="w-8 h-8 animate-spin mb-2" />
              <p>Buscando en la base de datos...</p>
            </div>
          ) : results.length > 0 ? (
            <div className="p-2">
              {results.map((patient) => (
                <button
                  key={patient.id}
                  onClick={() => handlePatientSelect(patient)}
                  className="w-full flex items-center gap-4 p-4 rounded-2xl hover:bg-white/5 transition-all group text-left"
                >
                  <div className="w-12 h-12 rounded-xl bg-blue-500/10 flex items-center justify-center text-blue-500 group-hover:scale-110 transition-transform">
                    <User size={24} />
                  </div>
                  <div className="flex-1">
                    <h4 className="text-white font-bold tracking-tight">
                      {patient.apellido}, {patient.nombre}
                    </h4>
                    <div className="flex items-center gap-4 mt-1">
                      <span className="flex items-center gap-1.5 text-xs text-slate-500">
                        <FileText size={12} />
                        DNI: {patient.documento}
                      </span>
                      <span className="flex items-center gap-1.5 text-xs text-slate-500">
                        <Calendar size={12} />
                        Nac: {patient.fecha_nac || 'N/A'}
                      </span>
                    </div>
                  </div>
                  <div className="text-right">
                    <span className="text-[10px] font-bold text-blue-500 bg-blue-500/10 px-2 py-1 rounded uppercase tracking-tighter">
                      ID: {patient.cod_paciente}
                    </span>
                    <ChevronRight className="ml-auto mt-2 text-slate-700 group-hover:text-blue-500 transition-colors" size={18} />
                  </div>
                </button>
              ))}
            </div>
          ) : query.length >= 3 ? (
            <div className="p-12 text-center text-slate-500">
              <p>No se encontraron pacientes que coincidan con "{query}"</p>
            </div>
          ) : (
            <div className="p-12 text-center text-slate-500">
              <Search className="w-12 h-12 mx-auto mb-4 opacity-10" />
              <p>Ingresa al menos 3 caracteres para comenzar la búsqueda</p>
            </div>
          )}
        </div>

        {/* Footer info */}
        <div className="p-4 bg-slate-950/50 border-t border-white/5 flex justify-between items-center">
          <span className="text-[10px] text-slate-600 font-bold uppercase tracking-widest">
            {results.length} resultados encontrados
          </span>
          <div className="flex gap-2">
            <kbd className="px-2 py-1 bg-slate-800 rounded text-[10px] text-slate-500 border border-white/5 font-sans">ESC</kbd>
            <span className="text-[10px] text-slate-600 self-center">para cerrar</span>
          </div>
        </div>
      </div>
    </div>
  );
};

export default PatientSearchModal;
