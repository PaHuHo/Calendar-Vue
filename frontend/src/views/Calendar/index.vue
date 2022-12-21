<template>
    <HeaderVue></HeaderVue>
    <div class="content-wrapper" style="min-height: 187px;">
        <div class="row pt-20">

            <!-- Calendar -->
            <div class="col-md-9 col-sm-9 col-xs-9">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-calendar"></i>Calendar</h3>
                    </div>
                    <div class="panel-body">
                        <div class="jarviswidget ">
                            <div>
                                <div class="widget-body no-padding  drop-zone">
                                    <FullCalendar id="calendar" :options="calendarOptions">
                                        <template v-slot:eventContent='arg'>
                                            <div style="white-space:normal">
                                                <span>{{ arg.event.title }} <br>
                                                    <span>{{ arg.event.extendedProps.story }}</span>
                                                </span>

                                                <i :class="arg.event.extendedProps.icon"></i>
                                            </div>

                                        </template>
                                    </FullCalendar>

                                </div>

                            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- Event -->
            <div class="col-md-3 col-sm-3 col-xs-3">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title">Add event</h3>
                            </div>
                            <div class="panel-body">
                                <form id="add-event-form">
                                    <input type="hidden" name="_token" value="aXn3RkA1NkaenGMqMEfLpy9Hw6vH9wvF7J6HVR1p">
                                    <fieldset>

                                        <div class="form-group">
                                            <label>New event ICON</label>
                                            <div class="btn-group btn-group-sm btn-group-justified"
                                                data-toggle="buttons">
                                                <label v-for="(icon, index) in iconPicker"
                                                    :class="['btn btn-default ', (icon.active ? 'active focus' : '')].join(' ')"
                                                    @click="ChangeIcon(icon, false)">
                                                    <input type="radio" name="iconselect" id="icon-1" :value="icon.icon"
                                                        :checked="icon.active" v-model="eventFormAdd.icon">
                                                    <i :class="['text-muted ', 'fa ' + (icon.icon),].join(' ')"></i>
                                                </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Event name</label>
                                            <input class="form-control" id="title" name="title" maxlength="40"
                                                type="text" placeholder="Event Title" v-model="eventFormAdd.title">
                                        </div>
                                        <div class="form-group">
                                            <label>Short story</label>
                                            <textarea class="form-control" placeholder="Please be brief" rows="3"
                                                maxlength="40" id="description"
                                                v-model="eventFormAdd.short_story"></textarea>
                                            <p class="note">Up to 40 words</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Choose the color</label>
                                            <div class="btn-group btn-group-justified btn-select-tick"
                                                data-toggle="buttons">
                                                <label v-for="(color, index) in colorPicker"
                                                    :class="[(color.color), 'text-white btn ' + (color.active ? 'focus active' : '')].join(' ')"
                                                    @click="ChangeColor(color)">
                                                    <input type="radio" name="priority" id="option2"
                                                        :value="color.color" v-model="eventFormAdd.color">
                                                    <i class="fa fa-check txt-color-white"></i>
                                                </label>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default" type="button" id="add-event"
                                                    @click="addEvent()">
                                                    Add
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="well well-sm" id="event-container">
                            <form>
                                <input type="hidden" name="_token" value="aXn3RkA1NkaenGMqMEfLpy9Hw6vH9wvF7J6HVR1p">
                                <legend>
                                    Event
                                </legend>
                                <ul id="external-events" class="list-unstyled">
                                    <li v-for="e in eventList" style="position: relative;" :data-eventid="e.id"
                                        :data-description="e.short_story" :data-icon="e.icon" :data-color="e.color"
                                        :data-title="e.title"
                                        :class="[(e.color), 'txt-color-white fc-event'].join(' ')">
                                        <span>{{ e.title
                                        }}<br>
                                            <span
                                                style="color: #fff;color: rgba(255, 255, 255, .7);font-size: 11px;font-weight: 400;display: block;line-height: 0;margin: 7px 0;text-transform: lowercase;">
                                                {{ e.short_story }}</span>
                                        </span>

                                    </li>

                                </ul>
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="drop-remove" class="checkbox style-0">
                                        <span>Delete after adding to calendar</span> </label>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Model  -->
    <div class="modal fade " id="createForm" tabindex="-1" role="dialog" data-backdrop="false"
        aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
            <div class="modal-content">
                <div class="modal-header"
                    style="background-color:#e9e9e9; height: 30px; margin: 5px; border: 1px solid #ddd;">
                    <div class="modal-title"></div>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        style="position: absolute;right: 10px;">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="padding-top:5px">
                    <div class="panel panel-primary" style="border: none;margin-bottom: 0;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Add event</h3>
                        </div>
                        <div class="panel-body">
                            <form id="add-event-form">
                                <fieldset>
                                    <div class="form-group">
                                        <label>New event ICON</label>
                                        <div class="btn-group btn-group-sm btn-group-justified" data-toggle="buttons">
                                            <label v-for="(icon, index) in iconPickerPopup"
                                                :class="['btn btn-default ', (icon.active ? 'active focus' : '')].join(' ')"
                                                @click="ChangeIcon(icon, true)">
                                                <input type="radio" name="iconselect" id="icon-1" :value="icon.icon"
                                                    :checked="icon.active" v-model="eventFormPopAdd.icon">
                                                <i :class="['text-muted ', 'fa ' + (icon.icon),].join(' ')"></i>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Event name</label>
                                        <input class="form-control" id="title" name="title" maxlength="40" type="text"
                                            placeholder="Event Title" v-model="eventFormPopAdd.title">
                                    </div>
                                    <div class="form-group">
                                        <label>Short story</label>
                                        <textarea class="form-control" placeholder="Please be brief" rows="3"
                                            maxlength="40" id="description"
                                            v-model="eventFormPopAdd.short_story"></textarea>
                                        <p class="note">Up to 40 words</p>
                                    </div>

                                    <div class="form-group">
                                        <label>Choose the color</label>
                                        <div class="btn-group btn-group-justified btn-select-tick"
                                            data-toggle="buttons">
                                            <label v-for="(color, index) in colorPicker"
                                                :class="[(color.color), 'text-white btn ' + (color.active ? 'focus active' : '')].join(' ')"
                                                @click="ChangeColor(color, true)">
                                                <input type="radio" name="priority" id="option2" :value="color.color"
                                                    v-model="eventFormPopAdd.color">
                                                <i class="fa fa-check txt-color-white"></i>
                                            </label>
                                        </div>
                                    </div>

                                </fieldset>
                            </form>
                        </div>
                    </div>
                </div>

                <div class="model-footer" style="height: 50px;">
                    <button class="btn btn-default" type="button" id="add-event" @click="addEventPopIntoCalendar()"
                        style="position: absolute;right: 20px;bottom: 10px;">
                        Add
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import FooterVue from '../../containers/Footer.vue';
import HeaderVue from '../../containers/Header.vue';
import axios from "axios";

import { Calendar } from '@fullcalendar/core';
import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin, { Draggable } from '@fullcalendar/interaction';
import { INITIAL_EVENTS, colorTheme, getCalendar, loadIdLast, LAST_ID } from "./event-utils";
// import { CAlert } from '@coreui/vue';

// import { mapGetters } from "vuex";
// import { mapActions } from "vuex";

export default {

    components: { FooterVue, HeaderVue, FullCalendar },

    mounted() {

        this.eventFormAdd.color = this.colorPicker[0].color
        this.colorSelect = this.colorPicker[0].id

        this.eventFormAdd.icon = this.iconPicker[0].icon
        this.iconSelect = this.iconPicker[0].id

        this.getListEvent()
        this.$nextTick(function () {
            this.makeDraggable()
        })
    },
    created() {
    },
    data() {
        return {
            eventFormAdd: {
                title: '',
                short_story: '',
                color: '',
                icon: '',
            },
            eventFormPopAdd: {
                title: '',
                short_story: '',
                color: '',
                icon: '',
                start: '',
                end: ''
            },
            eventList: [],
            iconPickerPopup: [
                {
                    id: 0,
                    icon: 'fa fa-info',
                    active: true,
                }, {
                    id: 1,
                    icon: 'fa fa-warning',
                    active: false,
                }, {
                    id: 2,
                    icon: 'fa fa-check',
                    active: false,
                }, {
                    id: 3,
                    icon: 'fa fa-user',
                    active: false,
                }, {
                    id: 4,
                    icon: 'fa fa-lock',
                    active: false,
                }, {
                    id: 5,
                    icon: 'fa fa-clock-o',
                    active: false,
                },
            ],
            iconSelectPopup: null,

            iconPicker: [
                {
                    id: 0,
                    icon: 'fa fa-info',
                    active: true,
                }, {
                    id: 1,
                    icon: 'fa fa-warning',
                    active: false,
                }, {
                    id: 2,
                    icon: 'fa fa-check',
                    active: false,
                }, {
                    id: 3,
                    icon: 'fa fa-user',
                    active: false,
                }, {
                    id: 4,
                    icon: 'fa fa-lock',
                    active: false,
                }, {
                    id: 5,
                    icon: 'fa fa-clock-o',
                    active: false,
                },
            ],
            iconSelect: null,

            colorPickerPop: [
                {
                    id: 0,
                    color: 'bg-color-darken',
                    active: true
                },
                {
                    id: 1,
                    color: 'bg-color-blue ',
                    active: false
                }, {
                    id: 2,
                    color: 'bg-color-orange ',
                    active: false
                }, {
                    id: 3,
                    color: 'bg-color-greenLight ',
                    active: false
                }, {
                    id: 4,
                    color: 'bg-color-blueLight',
                    active: false
                },
                {
                    id: 5,
                    color: 'bg-color-red',
                    active: false
                },
            ],
            colorSelectPop: null,
            colorPicker: [
                {
                    id: 0,
                    color: 'bg-color-darken',
                    active: true
                },
                {
                    id: 1,
                    color: 'bg-color-blue ',
                    active: false
                }, {
                    id: 2,
                    color: 'bg-color-orange ',
                    active: false
                }, {
                    id: 3,
                    color: 'bg-color-greenLight ',
                    active: false
                }, {
                    id: 4,
                    color: 'bg-color-blueLight',
                    active: false
                },
                {
                    id: 5,
                    color: 'bg-color-red',
                    active: false
                },
            ],
            colorSelect: null,
            calendarOptions: {
                plugins: [
                    dayGridPlugin,
                    interactionPlugin // needed for dateClick
                ],
                initialView: 'dayGridMonth',

                headerToolbar: {
                    left: 'prev',
                    center: 'title',
                    right: 'next'
                },
                editable: true,
                dragRevertDuration: 0,
                droppable: true,
                selectable: true,
                weekends: true,
                select: this.handleDateSelect,
                eventClick: this.handleEventClick,
                eventsSet: this.handleEvents,
                droppable: true, // this allows things to be dropped onto the calendar
                events: INITIAL_EVENTS,
                eventDrop: this.eventDropAndResize,
                eventResize: this.eventDropAndResize,
                drop: this.addEventIntoCalendar
            },
            currentEvents: []
        };
    },

    methods: {
        resetForm() {
            this.eventFormPopAdd.title = '',
                this.eventFormPopAdd.short_story = '',
                this.eventFormPopAdd.start = ''
            this.eventFormPopAdd.end = ''

            this.eventFormPopAdd.color = this.colorPickerPop[0].color
            this.colorSelectPop = this.colorPickerPop[0].id

            this.eventFormPopAdd.icon = this.iconPickerPopup[0].icon
            this.iconSelectPopup = this.iconPickerPopup[0].id
        },
        async addEventPopIntoCalendar() {
            await axios.post("http://127.0.0.1:8000/api/calendar/add-new-event", {
                title: this.eventFormPopAdd.title,
                short_story: this.eventFormPopAdd.short_story,
                icon: this.eventFormPopAdd.icon,
                color: this.eventFormPopAdd.color,
                start: this.eventFormPopAdd.start,
                end: this.eventFormPopAdd.end
            })
            await this.getListEvent()
            this.calendarOptions.events = await getCalendar()
            this.resetForm()

            $('#createForm').modal('toggle');
        },
        async addEventIntoCalendar(e) {
            var id = e.draggedEl.getAttribute('data-eventid')
            var start = e.dateStr
            var end = e.dateStr
            await axios.post("http://127.0.0.1:8000/api/calendar/add/" + id, {
                start: start,
                end: end
            })
            loadIdLast()

            // is the "remove after drop" checkbox checked?
            // if ($('#drop-remove').is(':checked')) {
            //     // if so, remove the element from the "Draggable Events" list
            //     $(this).remove();
            // }
        },
        makeDraggable() {

            let draggable = document.getElementById('external-events')
            new Draggable(draggable, {
                itemSelector: ".fc-event",

                eventData: function (eventE1) {
                    var id = LAST_ID
                    console.log(id + 1)
                    return {
                        id: id + 1,
                        story: eventE1.getAttribute('data-description'),
                        title: eventE1.getAttribute('data-title'),
                        icon: eventE1.getAttribute('data-icon'),
                        color: colorTheme(eventE1.getAttribute('data-color')),
                    }
                }
            })
        },
        async eventDropAndResize(e) {
            var id = e.event.id
            var start = e.event.start
            var end = e.event.end ? e.event.end : e.event.start
            await axios.post("http://127.0.0.1:8000/api/calendar/update/" + id, {
                start: start,
                end: end
            })

        },
        // ...mapActions(["getCalendar", "addData"]),
        async getListEvent() {
            await axios.get("http://127.0.0.1:8000/api/events").then((res) => {
                this.eventList = res.data.events
                // console.log(res.data.events)
            })

        },
        ChangeColor(color, isPopup = false) {
            if (isPopup) {
                this.colorPickerPop[this.colorSelectPop].active = false
                this.colorPickerPop[color.id].active = true
                this.colorSelectPop = this.colorPickerPop[color.id].id
                this.eventFormPopAdd.color = this.colorPickerPop[color.id].color
            } else {
                this.colorPicker[this.colorSelect].active = false
                this.colorPicker[color.id].active = true
                this.colorSelect = this.colorPicker[color.id].id
                this.eventFormAdd.color = this.colorPicker[color.id].color
            }
            // var products = color.target.value;

            console.log(this.eventFormAdd.color);
        },
        ChangeIcon(icon, isPopup = false) {
            if (isPopup) {
                this.iconPickerPopup[this.iconSelectPopup].active = false
                this.iconPickerPopup[icon.id].active = true
                this.iconSelectPopup = this.iconPickerPopup[icon.id].id
                this.eventFormPopAdd.icon = this.iconPickerPopup[icon.id].icon
            } else {
                this.iconPicker[this.iconSelect].active = false
                this.iconPicker[icon.id].active = true
                this.iconSelect = this.iconPicker[icon.id].id
                this.eventFormAdd.icon = this.iconPicker[icon.id].icon
            }
            // var products = color.target.value;
        },
        handleDateSelect(e) {

            this.eventFormPopAdd.color = this.colorPickerPop[0].color
            this.colorSelectPop = this.colorPickerPop[0].id

            this.eventFormPopAdd.icon = this.iconPickerPopup[0].icon
            this.iconSelectPopup = this.iconPickerPopup[0].id

            this.eventFormPopAdd.start = e.start
            this.eventFormPopAdd.end = e.end ? e.end : e.start
            $('#createForm').modal('show');
            $('.modal-content').draggable({
                zIndex: 999,
                revertDuration: 0 //  original position after the drag
            });
            // let title = prompt('Please enter a new title for your event')
            // let calendarApi = selectInfo.view.calendar

            // calendarApi.unselect() // clear date selection

            // if (title) {
            //     this.id = this.id + 1
            //     calendarApi.addEvent({
            //         id: this.id,
            //         title: title,
            //         start: selectInfo.startStr,
            //         end: selectInfo.endStr,
            //         allDay: selectInfo.allDay
            //     })
            // }
        },
        async handleEventClick(clickInfo) {
            let choose = prompt('Please select the action to be performed: 1: Edit 2: Delete')

            switch (choose) {

                //Update
                case "1": {
                    var id = clickInfo.event.id
                    var title = clickInfo.event.title
                    let temp = (prompt('Title: ', title))
                    title = temp ? temp : clickInfo.event.title

                    var short_story = clickInfo.event.extendedProps.story
                    let temp2 = prompt('Description:', short_story)
                    short_story = temp2 ? temp2 : clickInfo.event.extendedProps.story

                    // let calendarApi = clickInfo.view.calendar
                    // calendarApi.unselect()


                    if (title && short_story) {

                        await axios.post('http://127.0.0.1:8000/api/events/update/' + id, {
                            title: title,
                            short_story: short_story
                        })
                        clickInfo.event.remove()
                        //Tam thoi nhu nay thoi huhu
                        await this.getListEvent()
                        this.calendarOptions.events = await getCalendar()
                    }
                    break;
                }
                //Delete
                case "2": {
                    var id = clickInfo.event.id
                    console.log(id)
                    if (confirm(`Are you sure you want to delete the event '${clickInfo.event.title}'`)) {
                        await axios.post('http://127.0.0.1:8000/api/calendar/delete/' + id)
                        clickInfo.event.remove()
                    }
                    break;
                }
            }
        },
        handleEvents(events) {
            this.currentEvents = events
        },

        async addEvent() {
            await axios.post("http://127.0.0.1:8000/api/events/add/", {
                title: this.eventFormAdd.title,
                short_story: this.eventFormAdd.short_story,
                icon: this.eventFormAdd.icon,
                color: this.eventFormAdd.color
            })
            await this.getListEvent()
        }
    },
    computed: {

        // ...mapGetters(["EVENTS"]),
    }
}
</script>


<style scoped>
.modal-content {
    -webkit-box-shadow: 0 5px 15px rgba(0, 0, 0, 0);
    -moz-box-shadow: 0 5px 15px rgba(0, 0, 0, 0);
    -o-box-shadow: 0 5px 15px rgba(0, 0, 0, 0);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0);
}

.jarviswidget {
    margin: 0 0 30px;
    position: relative;
    -moz-border-radius: 0;
    -khtml-border-radius: 0;
    -webkit-border-radius: 0;
    border-radius: 0;
    padding: 0;
}

.jarviswidget>div {
    float: left;
    width: 100%;
    position: relative;
    font-size: 13px;
    -moz-border-radius: 0;
    -khtml-border-radius: 0;
    -webkit-border-radius: 0;
    border-radius: 0;
    margin: 0;
    border-width: 1px 1px 2px;
    border-style: solid;
    border-top: none;
    border-right-color: #CCC !important;
    border-bottom-color: #CCC !important;
    border-left-color: #CCC !important;
    padding: 13px 13px 0;
    overflow: visible;
}

.widget-body.no-padding {
    margin: -13px -13px 0;
}

.jarviswidget .widget-body {
    min-height: 100px;
    position: relative;
    padding-bottom: 13px;
}

.no-padding {
    padding: 0 !important;
}

.btn-select-tick .active i {
    display: block;
}

.btn-select-tick i {
    display: none;
}

.bg-color-darken {
    background-color: #404040 !important;
}

.bg-color-blue {
    background-color: #57889c !important;
}

.bg-color-orange {
    background-color: #c79121 !important;
}

.bg-color-greenLight {
    background-color: #71843f !important;
}

.bg-color-blueLight {
    background-color: #92a2a8 !important;
}

.bg-color-red {
    background-color: #a90329 !important;
}

#external-events li>:first-child {
    padding: 5px 10px 10px;
    cursor: move;
    display: block;
}

.txt-color-white {
    color: #fff !important;
}

#external-events li {
    margin: 6px 4px 6px 0;
    display: inline-block;
}

.ui-draggable-handle {
    -ms-touch-action: none;
    touch-action: none;
}

.fc-event.fc-event-draggable {
    cursor: move;
}

.model-header {
    cursor: move;
}
</style>