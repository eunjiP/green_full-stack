// 재사용성을 높이기 위해서 사용하는 페이지
import axios from "axios";

export default {
    data() {
        return {
            key: '9327301d882811904d8caa4ab3d63bb6',
            baseUrl:'http://www.kobis.or.kr/kobisopenapi/webservice/rest/',
            boxOfficeByDay : 'boxoffice/searchDailyBoxOfficeList.json',
            boxOfficeByWeek : 'boxoffice/searchWeeklyBoxOfficeList.json'
        }
    },
    // p.274
    methods: {
        async $api(url, parameter) {
            return (await axios.get(url, {
                params: parameter
            })
            .catch(e => {
                console.log(e);
            })).data;
        },
        async getBoxOfficeByDay(targetDt) {
            const parameter = {
                key: this.key,
                //'targeDt' : targetDt와 같은 말
                targetDt
            }
            const url = this.baseUrl + this.boxOfficeByDay;
            return await this.$api(url, parameter);
        },
        async getBoxOfficeByWeek(targetDt, weekGb) {
            const parameter = {
                key: this.key,
                targetDt,
                weekGb
            }
            const url = this.baseUrl + this.boxOfficeByWeek;
            return await this.$api(url, parameter);
        },
        getDateStr(d) {
            return d.toISOString().split('T')[0];
        },
    }
}