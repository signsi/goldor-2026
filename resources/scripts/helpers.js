/**
* Debounce.
*
* @param {Function} func
* @param {number} wait
* @param {boolean} immediate
*/
export function debounce(func, wait, immediate) {
   'use strict';

   var timeout;
   wait      = (typeof wait !== 'undefined') ? wait : 50;
   immediate = (typeof immediate !== 'undefined') ? immediate : true;

   return function() {
       var context = this, args = arguments;
       var later = function() {
           timeout = null;

           if (!immediate) {
               func.apply(context, args);
           }
       };

       var callNow = immediate && !timeout;

       clearTimeout(timeout);
       timeout = setTimeout(later, wait);

       if (callNow) {
           func.apply(context, args);
       }
   };
}