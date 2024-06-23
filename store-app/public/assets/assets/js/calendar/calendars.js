'use strict';

/* eslint-disable require-jsdoc, no-unused-vars */
var CalendarList = [];
function CalendarInfo() {
    this.id = null;
    this.name = null;
    this.checked = true;
    this.color = null;
    this.bgColor = null;
    this.borderColor = null;
    this.dragBgColor = null;
}
function addCalendar(calendar) {
    CalendarList.push(calendar);
}

function findCalendar(id) {
    var found;

    CalendarList.forEach(function(calendar) {
        if (calendar.id === id) {
            found = calendar;
        }
    });

    return found || CalendarList[0];
}

function hexToRGBA(hex) {
    var radix = 16;
    var r = parseInt(hex.slice(1, 3), radix),
        g = parseInt(hex.slice(3, 5), radix),
        b = parseInt(hex.slice(5, 7), radix),
        a = parseInt(hex.slice(7, 9), radix) / 255 || 1;
    var rgba = 'rgba(' + r + ', ' + g + ', ' + b + ', ' + a + ')';

    return rgba;
}

(function() {
    var calendar;
    var id = 0;

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'My Calendar';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.primary;
    calendar.dragBgColor = TivoAdminConfig.primary;
    calendar.borderColor = TivoAdminConfig.primary;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'Company';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.secondary;
    calendar.dragBgColor = TivoAdminConfig.secondary;
    calendar.borderColor = TivoAdminConfig.secondary;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'Family';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.success;
    calendar.dragBgColor = TivoAdminConfig.success;
    calendar.borderColor = TivoAdminConfig.success;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'Friend';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.info;
    calendar.dragBgColor = TivoAdminConfig.info;
    calendar.borderColor = TivoAdminConfig.info;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'Travel';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.warning;
    calendar.dragBgColor = TivoAdminConfig.warning;
    calendar.borderColor = TivoAdminConfig.warning;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'etc';
    calendar.color = '#ffffff';
    calendar.bgColor = TivoAdminConfig.danger;
    calendar.dragBgColor = TivoAdminConfig.danger;
    calendar.borderColor = TivoAdminConfig.danger;
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'Birthdays';
    calendar.color = '#ffffff';
    calendar.bgColor = '#e2c636';
    calendar.dragBgColor = '#e2c636';
    calendar.borderColor = '#e2c636';
    addCalendar(calendar);

    calendar = new CalendarInfo();
    id += 1;
    calendar.id = String(id);
    calendar.name = 'National Holidays';
    calendar.color = '#ffffff';
    calendar.bgColor = '#d22d3d';
    calendar.dragBgColor = '#d22d3d';
    calendar.borderColor = '#d22d3d';
    addCalendar(calendar);
})();