import axios from "axios";
import Alpine from "alpinejs";
import sketchBoard from "./components/sketchBoard.js";

window.axios = axios;
window.axios.defaults.headers.common["X-Requested-With"] = "XMLHttpRequest";

// Register Alpine components
Alpine.data("sketchBoard", sketchBoard);

// Make Alpine available globally
window.Alpine = Alpine;

// Start Alpine
Alpine.start();
