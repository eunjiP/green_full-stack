export default {
    getTimestamp: function(date) {  //date파라미터는 Date객체
        date.setHours(date.getHours() + 9);
        return date.toISOString().replace('T', ' ').substring(0, 19);
    }
}