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

                        <!-- <v-calendar is-expanded :attributes='attrs'/> -->
                        <!-- <v-date-picker v-model='selectedDate' /> -->
                        <div class="jarviswidget ">
                            <div>
                                <div class="widget-body no-padding">
                                    <FullCalendar :options="options" />
                                    <!-- <v-calendar class="custom-calendar" :masks="masks" :attributes="attributes"
                                        disable-page-swipe>
                                        <template v-slot:day-content="{ day, attributes }">
                                            <div class="flex flex-col h-full z-10 overflow-hidden">
                                                <span class="day-label text-sm text-gray-900">{{ day.day }}</span>
                                                <div class="flex-grow overflow-y-auto overflow-x-auto">
                                                    <p v-for="attr in attributes" :key="attr.key"
                                                        class="text-xs leading-tight rounded-sm p-1 mt-0 mb-1"
                                                        :class="attr.customData.class">
                                                        {{ attr.customData.title }}
                                                    </p>
                                                </div>
                                            </div>
                                        </template>
                                    </v-calendar> -->
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
                                                <label class="btn btn-default active">
                                                    <input type="radio" name="iconselect" id="icon-1" value="fa-info"
                                                        checked="">
                                                    <i class="fa fa-info text-muted"></i> </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="iconselect" id="icon-2"
                                                        value="fa-warning">
                                                    <i class="fa fa-warning text-muted"></i> </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="iconselect" id="icon-3" value="fa-check">
                                                    <i class="fa fa-check text-muted"></i> </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="iconselect" id="icon-4" value="fa-user">
                                                    <i class="fa fa-user text-muted"></i> </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="iconselect" id="icon-5" value="fa-lock">
                                                    <i class="fa fa-lock text-muted"></i> </label>
                                                <label class="btn btn-default">
                                                    <input type="radio" name="iconselect" id="icon-6"
                                                        value="fa-clock-o">
                                                    <i class="fa fa-clock-o text-muted"></i> </label>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label>Event name</label>
                                            <input class="form-control" id="title" name="title" maxlength="40"
                                                type="text" placeholder="Event Title">
                                        </div>
                                        <div class="form-group">
                                            <label>Short story</label>
                                            <textarea class="form-control" placeholder="Please be brief" rows="3"
                                                maxlength="40" id="description"></textarea>
                                            <p class="note">Up to 40 words</p>
                                        </div>

                                        <div class="form-group">
                                            <label>Choose the color</label>
                                            <div class="btn-group btn-group-justified btn-select-tick"
                                                data-toggle="buttons">
                                                <label class="btn bg-color-darken active">
                                                    <input type="radio" name="priority" id="option1"
                                                        value="bg-color-darken txt-color-white" checked="">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                                <label class="btn bg-color-blue">
                                                    <input type="radio" name="priority" id="option2"
                                                        value="bg-color-blue txt-color-white">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                                <label class="btn bg-color-orange">
                                                    <input type="radio" name="priority" id="option3"
                                                        value="bg-color-orange txt-color-white">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                                <label class="btn bg-color-greenLight">
                                                    <input type="radio" name="priority" id="option4"
                                                        value="bg-color-greenLight txt-color-white">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                                <label class="btn bg-color-blueLight">
                                                    <input type="radio" name="priority" id="option5"
                                                        value="bg-color-blueLight txt-color-white">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                                <label class="btn bg-color-red">
                                                    <input type="radio" name="priority" id="option6"
                                                        value="bg-color-red txt-color-white">
                                                    <i class="fa fa-check txt-color-white"></i> </label>
                                            </div>
                                        </div>

                                    </fieldset>
                                    <div class="form-actions">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <button class="btn btn-default" type="button" id="add-event">
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
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-blueLight txt-color-white" data-eventid="1"
                                            data-description="The date of shipment is not calculated"
                                            data-icon="fa-lock">WTH holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-orange txt-color-white" data-eventid="2" data-description="
No shipment during holidays in Japan" data-icon="fa-warning">Japan holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-orange txt-color-white" data-eventid="3" data-description="
No shipment during holidays in Japan" data-icon="fa-warning">Japan holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-orange txt-color-white" data-eventid="4" data-description="
No shipment during holidays in Japan" data-icon="fa-warning">Japan holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-darken txt-color-white" data-eventid="5"
                                            data-description="No Description" data-icon="fa-info">Songkrang
                                            holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-darken txt-color-white" data-eventid="6"
                                            data-description="No Description" data-icon="fa-info">Untitled Event</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-red txt-color-white" data-eventid="7"
                                            data-description="No Description" data-icon="fa-lock">WTH holiday</span>
                                    </li>
                                    <li class="ui-draggable ui-draggable-handle" style="position: relative;">
                                        <span class="bg-color-red txt-color-white" data-eventid="8"
                                            data-description="No Description" data-icon="fa-lock">Thailand national
                                            holiday</span>
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
</template>

<script>
import FooterVue from '../containers/Footer.vue';
import HeaderVue from '../containers/Header.vue';

import { reactive } from 'vue'

import FullCalendar from '@fullcalendar/vue3';
import dayGridPlugin from '@fullcalendar/daygrid';
import interactionPlugin from '@fullcalendar/interaction';
export default {
    components: { FooterVue, HeaderVue ,FullCalendar},
    data() {
        const month = new Date().getMonth();
        const year = new Date().getFullYear();
        return {
            options: reactive({ plugins: [dayGridPlugin,], }),
            masks: {
                weekdays: 'WWW',
            },
            attributes: [
                {
                    key: 1,
                    customData: {
                        title: 'Lunch with mom.',
                        class: 'bg-red-600 text-white',
                    },
                    dates: new Date(year, month, 1),
                },
                {
                    key: 2,
                    customData: {
                        title: 'Take Noah to basketball practice',
                        class: 'bg-blue-500 text-white',
                    },
                    dates: new Date(year, month, 2),
                },
                {
                    key: 3,
                    customData: {
                        title: "Noah's basketball game.",
                        class: 'bg-blue-500 text-white',
                    },
                    dates: new Date(year, month, 5),
                },
                {
                    key: 4,
                    customData: {
                        title: 'Take car to the shop',
                        class: 'bg-indigo-500 text-white',
                    },
                    dates: new Date(year, month, 5),
                },
                {
                    key: 4,
                    customData: {
                        title: 'Meeting with new client.',
                        class: 'bg-teal-500 text-white',
                    },
                    dates: new Date(year, month, 7),
                },
                {
                    key: 5,
                    customData: {
                        title: "Mia's gymnastics practice.",
                        class: 'bg-pink-500 text-white',
                    },
                    dates: new Date(year, month, 11),
                },
                {
                    key: 6,
                    customData: {
                        title: 'Cookout with friends.',
                        class: 'bg-orange-500 text-white',
                    },
                    dates: { months: 5, ordinalWeekdays: { 2: 1 } },
                },
                {
                    key: 7,
                    customData: {
                        title: "Mia's gymnastics recital.",
                        class: 'bg-pink-500 text-white',
                    },
                    dates: new Date(year, month, 22),
                },
                {
                    key: 8,
                    customData: {
                        title: 'Visit great grandma.',
                        class: 'bg-red-600 text-white',
                    },
                    dates: new Date(year, month, 25),
                },
            ],
        };
    },

}
</script>


<style scoped>
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
</style>