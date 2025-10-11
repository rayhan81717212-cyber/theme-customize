import axios from "axios";

const baseApiUrl = "http://localhost/php_project-api/api/";

const api = axios.create({
    baseURL : baseApiUrl,
    headers: {
        "Content-Type": "aplication/json",
         
    }
});

api.interceptors.request.use(
    (config) => {
        const token = localStorage.getItem("bearer_token");
        if(token){
            config.headers.Authorization = `Bearer ${token}`;
        }
        return config;
    }, 
    (error) => Promise.reject(error)
);

export default api