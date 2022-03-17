import axios from "axios";
// import Auth from "./auth";

axios.defaults.baseURL = process.env.MIX_APP_URL;
export const get = (url, params = {}) => axios({ method: "GET", url, headers: {}, params });
export const del = (url) =>
    axios({
        url,
        method: "DELETE",
        headers: { Authorization: `Bearer ${Auth.state.api_token}` },
    });

export const interceptors = (cb) =>
    axios.interceptors.response.use(
        (res) => res,
        (err) => {
            cb(err);
            return Promise.reject(err);
        }
    );



