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

        async $delete(url, param) {
            return (await axios.delete(url, {
                params : param
            }).catch(e => {
                console.log(e);
            })).data;
        },

        $base64(file) {
            //프라미스를 사용하여 백엔드에 전달되게 됨 => 순차적으로 처리되는 프라미스로 결과가 나옴
            return new Promise(resolve => {
                const fr = new FileReader();
                fr.onload = e => {
                    //로딩 후 문자열로 된 결과가 담김
                    resolve(e.target.result);
                }
                //readAsDataURL : 넘어온 파일을 읽어주는 역할
                fr.readAsDataURL(file);
            });
        },
        
    }
}