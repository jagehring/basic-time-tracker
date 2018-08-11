// public/scripts/controllers/TimeEntry.js

(function() {

  'use strict';

  angular
    .module('timeTracker')
    .controller('TimeEntry', TimeEntry);

    function TimeEntry(time, user, $scope) {

      var vm = this;

      vm.timeentries = [];
      vm.totalTime = {};
      vm.users = [];

      // Initialize the clockIn and clockOut times to the current time.
      vm.clockIn = moment();
      vm.clockOut = moment();

      // Grab all the time entries saved in the database
      getTimeEntries();

      // Get the users from the database so we can select
      // who the time entry belongs to
      getUsers();

      function getUsers() {
        user.getUsers().then(function(result) {
          vm.users = result;
        }, function(error) {
          console.log(error);
        });
      }

      // Fetches the time entries and puts the results
      // on the vm.timeentries array
      function getTimeEntries() {
        time.getTime().then(function(results) {
          vm.timeentries = results;
            updateTotalTime(vm.timeentries);
            console.log(vm.timeentries);
          }, function(error) {
            console.log(error);
          });
        }         
