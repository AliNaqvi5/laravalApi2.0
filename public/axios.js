// import axios from 'axios';
// const axios = require('
// import axios, {isCancel, AxiosError} from 'axios';axios'); // legacy way
// async function getAlarms() {
//
//     try {
//         const response = await axios.post("http://127.0.0.1:8000/api/alarm-show", dataToS, { headers });
//         console.log(response);
//         return response;
//     } catch (error) {
//         console.error(error);
//     }
// }
// getAlarms();

let headers = {
    'Authorization': 'Bearer 1|G0QgCo6oLKceUdkl5KzwVtXo2q63hwm2RGFREp6qeb4990a8',
    'Content-Type': 'application/json',
};
const apiUrl = '/api/login';
const dataToSend = {
    email: 'alimir57@gmail.com',
    password: '12345',
};
axios.post(apiUrl, dataToSend, { headers })
    .then((response) => {
        console.log('Response:', response.data.message);
        if(((response.data.message).toString()).includes("successfully.")) {
            headers.Authorization ='Bearer '+response.data.data.token;
            console.log(headers.Authorization);
        }
    })
    .catch((error) => {
        console.error('Error:', error);
    });

async function getAlarms() {
    try {
          await axios.get("alarm-show").then(function (response) {
              if(response.data.success !== false) {
                  console.log("this",response)
                  $("#alarmModalTitle").html("Alarm "+response.data.data.sensor_id);
                  $("#alarmModalBody").html(response.data.data.title);
                  $("#alarmModalBtn").attr("onclick", 'Acknowledge(' + response.data.data.id + ')');

                  $('#alarmModal').modal('show');
              }
        });
    } catch (error) {
        console.error('Error:', error);
    }
}
function triggerAlarm(res)
{

}

async function Acknowledge(id)
{

    try {
        await axios.get("alarm-ack/"+id).then(function (){$('#alarmModal').modal('hide');}) ;
        // console.log('Response:', response.data);
    } catch (error) {
        console.error('Error:', error);
    }
}
// getAlarms();
setInterval(getAlarms,2000);

