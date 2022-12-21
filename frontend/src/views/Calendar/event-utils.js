import axios from "axios";
// import Vuex from 'vuex'


let data= await getCalendar();
export function colorTheme(color) {
  var colorPick = "";
  switch (color) {
    case "bg-color-darken":{
        colorPick = "#404040";
        break;
    }
    case "bg-color-blue":{
        colorPick = "#57889c";
        break;
    }
    case "bg-color-orange":{
        colorPick = "#c79121";
        break;
    }
    case "bg-color-greenLight":{
        colorPick = "#71843f";
        break;
    }
    case "bg-color-blueLight":{
        colorPick = "#92a2a8";
        break;
    }
    case "bg-color-red":{
        colorPick = "#a90329";
        break;
    }
  }
  return colorPick;
}

export const INITIAL_EVENTS =data
export async function getCalendar() {
  const response = await axios.get("http://127.0.0.1:8000/api/calendar");
  const data = [];
  response.data.calendar.forEach(function (currentValue, index, arr) {
    data.push({
      id: currentValue.id,
      title: currentValue.events.title,
      story:currentValue.events.short_story,
      icon: currentValue.events.icon,
      start: new Date(currentValue.start_day),
      end: new Date(currentValue.end_day),
      backgroundColor: colorTheme(currentValue.events.color),
      textColor: "white",
      allDay: true
    });
  });
  return data;
}

export var LAST_ID =await getLastId()
export async function loadIdLast(){
  LAST_ID= await getLastId()
}
async function getLastId() {
  const response = await axios.get("http://127.0.0.1:8000/api/calendar");
  const id = response.data.lastCalendarId;
  
  return id.id;
}