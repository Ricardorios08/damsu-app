import React, { useState } from 'react';
import { useNavigate } from 'react-router-dom';
import { Lock, User, LogIn } from 'lucide-react';

const Login = () => {
  const [usuario, setUsuario] = useState('');
  const [password, setPassword] = useState('');
  const [error, setError] = useState('');
  const [loading, setLoading] = useState(false);
  const navigate = useNavigate();

  const handleLogin = async (e) => {
    e.preventDefault();
    setLoading(true);
    setError('');

    try {
      // const apiUrl = 'http://192.168.2.166:8888/damsu-app/backend/api/login.php';
      const apiUrl = 'http://82.25.78.98/damsu-app/backend/api/login.php';
      const response = await fetch(apiUrl, {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({ usuario, password }),
      });

      if (!response.ok) {
        throw new Error(`HTTP Error: ${response.status}`);
      }

      const data = await response.json();

      if (data.status === 'success') {
        localStorage.setItem('user', JSON.stringify(data.user));
        navigate('/dashboard');
      } else {
        setError(data.message || 'Credenciales incorrectas');
      }
    } catch (err) {
      setError('Error de conexión con el servidor');
    } finally {
      setLoading(false);
    }
  };

  return (
    <div className="min-h-screen flex items-center justify-center bg-slate-950 p-4 relative overflow-hidden">
      {/* Background Orbs */}
      <div className="absolute top-0 -left-4 w-72 h-72 bg-blue-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
      <div className="absolute top-0 -right-4 w-72 h-72 bg-purple-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
      <div className="absolute -bottom-8 left-20 w-72 h-72 bg-emerald-600 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-4000"></div>

      <div className="w-full max-w-md relative z-10">
        <div className="bg-slate-900/50 backdrop-blur-xl border border-white/10 p-8 rounded-3xl shadow-2xl animate-fade-in">
          <div className="text-center mb-10">
            <div className="inline-flex items-center justify-center w-20 h-20 bg-blue-500/10 rounded-2xl mb-6 border border-blue-500/20 shadow-inner">
              <LogIn className="w-10 h-10 text-blue-500" />
            </div>
            <h1 className="text-4xl font-extrabold text-white tracking-tight mb-2">
              DAMSU <span className="text-blue-500">APP</span>
            </h1>
            <p className="text-slate-400 font-medium">Sistema de Trazabilidad Oncológica DAMSU</p>
          </div>

          <form onSubmit={handleLogin} className="space-y-6">
            {error && (
              <div className="bg-red-500/10 border border-red-500/20 text-red-400 p-4 rounded-xl text-sm flex items-center gap-3">
                <div className="w-1.5 h-1.5 bg-red-500 rounded-full animate-pulse"></div>
                {error}
              </div>
            )}

            <div className="space-y-2">
              <label className="text-sm font-semibold text-slate-300 ml-1">Usuario</label>
              <div className="relative group">
                <User className="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-500 group-focus-within:text-blue-500 transition-colors" />
                <input
                  type="text"
                  placeholder="Ingrese su usuario"
                  className="w-full bg-slate-950/50 border border-white/5 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder:text-slate-600"
                  value={usuario}
                  onChange={(e) => setUsuario(e.target.value)}
                  required
                />
              </div>
            </div>

            <div className="space-y-2">
              <label className="text-sm font-semibold text-slate-300 ml-1">Contraseña</label>
              <div className="relative group">
                <Lock className="absolute left-4 top-1/2 -translate-y-1/2 w-5 h-5 text-slate-500 group-focus-within:text-blue-500 transition-colors" />
                <input
                  type="password"
                  placeholder="••••••••"
                  className="w-full bg-slate-950/50 border border-white/5 rounded-xl py-3 pl-12 pr-4 text-white focus:outline-none focus:border-blue-500/50 focus:ring-4 focus:ring-blue-500/10 transition-all placeholder:text-slate-600"
                  value={password}
                  onChange={(e) => setPassword(e.target.value)}
                  required
                />
              </div>
            </div>

            <button
              type="submit"
              className="w-full bg-blue-600 hover:bg-blue-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-blue-600/20 transition-all active:scale-[0.98] disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center gap-2 group"
              disabled={loading}
            >
              {loading ? (
                <div className="w-5 h-5 border-2 border-white/30 border-t-white rounded-full animate-spin"></div>
              ) : (
                <>
                  <span>Ingresar al Sistema</span>
                  <LogIn className="w-5 h-5 group-hover:translate-x-1 transition-transform" />
                </>
              )}
            </button>
          </form>

          <div className="mt-10 pt-6 border-t border-white/5 text-center">
            <p className="text-slate-500 text-sm">
              © 2026 Damsu
            </p>
          </div>
        </div>
      </div>
    </div>
  );
};

export default Login;
