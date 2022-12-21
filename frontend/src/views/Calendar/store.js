import axios from "axios";
import Vuex from "vuex";

function colorTheme(color) {
  var colorPick = "";
  switch (color) {
    case "bg-color-darken": {
      colorPick = "#404040";
      break;
    }
    case "bg-color-blue": {
      colorPick = "#57889c";
      break;
    }
    case "bg-color-orange": {
      colorPick = "#c79121";
      break;
    }
    case "bg-color-greenLight": {
      colorPick = "#71843f";
      break;
    }
    case "bg-color-blueLight": {
      colorPick = "#92a2a8";
      break;
    }
    case "bg-color-red": {
      colorPick = "#a90329";
      break;
    }
  }
  return colorPick;
}
const store = new Vuex.Store({
  state: {
    events: [],
  },
  getters: {
    EVENTS: (state) => state.events,
  },
  mutations: {
    setData: (state, events) => (state.events = events),
    newData: (state, event) => state.events.push(event),
  },
  actions: {
    async getCalendar({ commit }) {
      const response = await axios.get("http://127.0.0.1:8000/api/calendar");
      const dummyAPI = [];

        response.data.calendar.forEach(function (currentValue, index, arr) {
          dummyAPI.push({
            id: currentValue.id,
            title: currentValue.events.title,
            story: currentValue.events.short_story,
            icon: currentValue.events.icon,
            start: new Date(currentValue.start_day),
            end: new Date(currentValue.end_day),
            backgroundColor: colorTheme(currentValue.events.color),
            textColor: "white",
          });
        });
      commit("setData", dummyAPI);
    },
    async addData({ commit }, event) {
      commit("newData", event);
    },
  },
});
export default store;
