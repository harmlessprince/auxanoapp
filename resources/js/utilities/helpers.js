import moment from "moment";
export const truncate = (string, limit) => {
    if (string.length <= limit) {
        return string;
    }
    return string.slice(0, limit) + "...";
};

export const formatDate = (date, format = null) => {
    if (!format) {
        return moment(date).fromNow();
    }
    return moment(date).format(format);
};
