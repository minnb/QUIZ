// ------------------------service câu hỏi----------------------------------------------- 
function ServiceQuestion() {
    this.http = new Http();
}
// lấy danh sách các câu hỏi 
//id : int Mã nhận dạng cho loại câu hỏi 
ServiceQuestion.prototype.getListQuestions = async function (id) {
    let uri = '/api/v1/quiz-take/' + id;
    let result = await this.http.get(uri);
    return result;
}

ServiceQuestion.prototype.getQuizId = async function (user_id, type, course, thematic, lesson, strToken) {
    let uri = '/api/v1/quiz/' + user_id + '/' + type +'/' + course + '/' + thematic + '/' + lesson + '/' + strToken;
    let result = await this.http.get(uri);
    return result;
}
//edit các câu hỏi
ServiceQuestion.prototype.sendTest = async function (body) {
    let uri = '/api/v1/quiz-take';
    let result = await this.http.post(uri, body);
    console.log(result);
    return result;
}