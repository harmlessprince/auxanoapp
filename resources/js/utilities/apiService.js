// import axios from "axios";
// import Auth from "./auth";
axios.defaults.baseURL = process.env.MIX_APP_URL;
export const get = (url, params = {}) =>
    axios({ method: "GET", url, headers: {}, params });
export const destroy = (url) =>
    axios({
        url,
        method: "DELETE",
        headers: {},
    });
export const post = (url, data) =>
    axios({
        method: "POST",
        url,
        data,
    });
export const put = (url, data) =>
    axios({
        method: "PUT",
        url,
        data,
    });
export const patch = (url, data) =>
    axios({
        method: "PATCH",
        url,
        data,
        headers: {},
    });
export const interceptors = (cb) =>
    axios.interceptors.response.use(
        (res) => res,
        (err) => {
            cb(err);
            return Promise.reject(err);
        }
    );

// before a request is made start the nprogress
// axios.interceptors.request.use((config) => {
//     NProgress.start();
//     return config;
// });

// before a response is returned stop nprogress
// axios.interceptors.response.use((response) => {
//     NProgress.done();
//     return response;
// });
