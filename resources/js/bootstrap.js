import axios from 'axios';
window.axios = axios;
import './bootstrap';
import '../css/app.css';

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
