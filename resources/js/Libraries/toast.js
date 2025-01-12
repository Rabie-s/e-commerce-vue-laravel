import { toast } from 'vue3-toastify';
import 'vue3-toastify/dist/index.css';

export function useToast() {
    const showToast = (message, options = {}) => {
      toast(message, {
        ...options,
        theme: toast.THEME.COLORED, // Use the COLORED theme here
        autoClose:700
      });
    };
  
    return {
      showToast,
    };
  }