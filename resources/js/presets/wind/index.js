import avatar from './avatar';
import calendar from './calendar';
import checkbox from './checkbox';
import dialog from './dialog';
import global from './global';
import inlinemessage from './inlinemessage';
import inputnumber from './inputnumber';
import inputswitch from './inputswitch';
import inputtext from './inputtext';
import message from './message';
import panel from './panel';
import progressbar from './progressbar';
import radiobutton from './radiobutton';
import selectbutton from './selectbutton';
import toast from './toast';

export default {
    global,
    directives: {
    },

    //forms
    inputnumber,
    inputtext,
    calendar,
    checkbox,
    radiobutton,
    inputswitch,
    selectbutton,

    //buttons

    //panels
    panel,

    //menu

    //overlays
    dialog,

    //messages
	//message,
    inlinemessage,
    toast,

    //misc
    avatar,
    progressbar
};
