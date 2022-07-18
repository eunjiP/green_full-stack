import axios from "axios";

export default {
    methods: {
        async $post(url, data) {
            return (await axios({
                method: 'post',
                url,
                data
            }).catch(e => {
                console.error(e);
            })).data;
        },
        async $get(url, param) {
            return (await axios.get(url, {
                params : param
            }).catch(e => {
                console.log(e);
            })).data;
        },

        $base64(file) {
            return new Promise(resolve => {
                const fr = new FileReader();
                fr.onload = e => {
                    resolve(e.target.result);
                }
                fr.readAsDataURL(file);
            });
        },
        
    }
}