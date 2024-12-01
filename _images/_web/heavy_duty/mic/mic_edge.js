/**
 * Adobe Helium: symbol definitions
 */
window.symbols = {
"stage": {
   version: "0.1.2",
   baseState: "Base State",
   initialState: "Base State",
   parameters: {

   },
   content: {
      dom: [
        {
            id:'body',
            className:'body_id',
            type:'image',
            tag:'div',
            rect:[0,0,234,355],
            fill:['rgba(0,0,0,0)','images/body.png']
        },
        {
            id:'left_arm',
            className:'left_arm_id',
            type:'image',
            tag:'div',
            rect:[0,0,166,121],
            fill:['rgba(0,0,0,0)','images/left_arm.png']
        },
        {
            id:'left-leg',
            className:'left-leg_id',
            type:'image',
            tag:'div',
            rect:[0,0,155,83],
            fill:['rgba(0,0,0,0)','images/left-leg.png']
        },
        {
            id:'right_arm',
            className:'right_arm_id',
            type:'image',
            tag:'div',
            rect:[0,0,173,112],
            fill:['rgba(0,0,0,0)','images/right_arm.png']
        },
        {
            id:'right_leg',
            className:'right_leg_id',
            type:'image',
            tag:'div',
            rect:[0,0,129,103],
            fill:['rgba(0,0,0,0)','images/right_leg.png']
        },
        {
            id:'Rectangle3',
            type:'rect',
            tag:'div',
            rect:[0,0,720,480],
            fill:['rgba(192,192,192,1)'],
            stroke:[0,"rgb(0, 0, 0)","none"]
        }      ],
      symbolInstances: [
      ],
   },
   states: {
      "Base State": {
         "#stage": [
            ["style", "height", '480px'],
            ["style", "overflow", 'hidden'],
            ["color", "background-color", 'rgba(255,255,255,1)'],
            ["style", "width", '720px']
         ],
         "#Rectangle3": [
            ["color", "background-color", 'rgba(255,255,255,1.00)'],
            ["style", "opacity", '0']
         ],
         "#left_arm": [
            ["style", "-webkit-transform-origin", [94.578313253012,67.355371900826],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-moz-transform-origin", [94.578313253012,67.355371900826],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-ms-transform-origin", [94.578313253012,67.355371900826],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "msTransformOrigin", [94.578313253012,67.355371900826],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-o-transform-origin", [94.578313253012,67.355371900826],{valueTemplate:'@@0@@% @@1@@%'}],
            ["transform", "translateY", '-318px'],
            ["transform", "translateX", '111px'],
            ["transform", "rotateZ", '33deg']
         ],
         "#right_arm": [
            ["style", "-webkit-transform-origin", [6.0693641618497,76.785714285714],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-moz-transform-origin", [6.0693641618497,76.785714285714],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-ms-transform-origin", [6.0693641618497,76.785714285714],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "msTransformOrigin", [6.0693641618497,76.785714285714],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-o-transform-origin", [6.0693641618497,76.785714285714],{valueTemplate:'@@0@@% @@1@@%'}],
            ["transform", "translateY", '-350px'],
            ["transform", "translateX", '426px'],
            ["transform", "rotateZ", '-52.99979deg']
         ],
         "#body": [
            ["transform", "translateX", '245px'],
            ["transform", "translateY", '-416px'],
            ["transform", "rotateZ", '0']
         ],
         "#right_leg": [
            ["style", "-webkit-transform-origin", [16.347792850962,17.910375243838],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-moz-transform-origin", [16.347792850962,17.910375243838],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-ms-transform-origin", [16.347792850962,17.910375243838],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "msTransformOrigin", [16.347792850962,17.910375243838],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-o-transform-origin", [16.347792850962,17.910375243838],{valueTemplate:'@@0@@% @@1@@%'}],
            ["transform", "translateX", '426px'],
            ["transform", "rotateZ", '0'],
            ["transform", "scaleX", '1'],
            ["transform", "translateY", '-122px'],
            ["transform", "scaleY", '1']
         ],
         "#left-leg": [
            ["style", "-webkit-transform-origin", [85.199489727036,5.5473371828127],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-moz-transform-origin", [85.199489727036,5.5473371828127],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-ms-transform-origin", [85.199489727036,5.5473371828127],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "msTransformOrigin", [85.199489727036,5.5473371828127],{valueTemplate:'@@0@@% @@1@@%'}],
            ["style", "-o-transform-origin", [85.199489727036,5.5473371828127],{valueTemplate:'@@0@@% @@1@@%'}],
            ["transform", "translateX", '217px'],
            ["transform", "rotateZ", '0'],
            ["transform", "translateY", '-82px'],
            ["transform", "scaleY", '1']
         ]
      }
   },
   actions: {

   },
   bindings: [

   ],
   timelines: {
      "Default Timeline": {
         fromState: "Base State",
         toState: "",
         duration: 3305,
         timeline: [
            { id: "eid14", tween: [ "style", "#stage", "height", '480px', { valueTemplate: undefined, fromValue: '480px'}], position: 0, duration: 0, easing: "linear" },
            { id: "eid39", tween: [ "transform", "#left_arm", "translateY", '143px', { valueTemplate: undefined, fromValue: '-318px'}], position: 0, duration: 1500, easing: "easeOutBounce" },
            { id: "eid23", tween: [ "transform", "#right_leg", "translateX", '428.41137px', { valueTemplate: undefined, fromValue: '426px'}], position: 1500, duration: 0, easing: "easeOutBounce" },
            { id: "eid37", tween: [ "transform", "#left-leg", "translateY", '382.89575px', { valueTemplate: undefined, fromValue: '-82px'}], position: 0, duration: 1500, easing: "easeOutBounce" },
            { id: "eid79", tween: [ "transform", "#right_leg", "scaleX", '1', { valueTemplate: undefined, fromValue: '1'}], position: 1500, duration: 0, easing: "linear" },
            { id: "eid78", tween: [ "transform", "#left_arm", "rotateZ", '15deg', { valueTemplate: undefined, fromValue: '33deg'}], position: 0, duration: 557, easing: "linear" },
            { id: "eid121", tween: [ "transform", "#left_arm", "rotateZ", '8.2258064516129deg', { valueTemplate: undefined, fromValue: '15deg'}], position: 557, duration: 294, easing: "linear" },
            { id: "eid96", tween: [ "transform", "#left_arm", "rotateZ", '19deg', { valueTemplate: undefined, fromValue: '8.2258064516129deg'}], position: 851, duration: 266, easing: "linear" },
            { id: "eid64", tween: [ "transform", "#left_arm", "rotateZ", '27deg', { valueTemplate: undefined, fromValue: '19deg'}], position: 1118, duration: 245, easing: "linear" },
            { id: "eid122", tween: [ "transform", "#left_arm", "rotateZ", '4deg', { valueTemplate: undefined, fromValue: '27deg'}], position: 1364, duration: 135, easing: "linear" },
            { id: "eid108", tween: [ "transform", "#left_arm", "rotateZ", '38deg', { valueTemplate: undefined, fromValue: '4deg'}], position: 1500, duration: 301, easing: "linear" },
            { id: "eid111", tween: [ "transform", "#left_arm", "rotateZ", '0deg', { valueTemplate: undefined, fromValue: '38deg'}], position: 1801, duration: 272, easing: "easeOutBounce" },
            { id: "eid27", tween: [ "transform", "#left_arm", "translateX", '111px', { valueTemplate: undefined, fromValue: '111px'}], position: 1500, duration: 0, easing: "easeOutBounce" },
            { id: "eid150", tween: [ "style", "#Rectangle3", "opacity", '1', { valueTemplate: undefined, fromValue: '0'}], position: 3000, duration: 305, easing: "linear" },
            { id: "eid98", tween: [ "transform", "#right_leg", "rotateZ", '9deg', { valueTemplate: undefined, fromValue: '0deg'}], position: 800, duration: 366, easing: "linear" },
            { id: "eid99", tween: [ "transform", "#right_leg", "rotateZ", '4deg', { valueTemplate: undefined, fromValue: '9deg'}], position: 1167, duration: 332, easing: "linear" },
            { id: "eid89", tween: [ "transform", "#left-leg", "scaleY", '0.9', { valueTemplate: undefined, fromValue: '1'}], position: 800, duration: 287, easing: "linear" },
            { id: "eid90", tween: [ "transform", "#left-leg", "scaleY", '0.95861', { valueTemplate: undefined, fromValue: '0.9'}], position: 1088, duration: 78, easing: "linear" },
            { id: "eid106", tween: [ "transform", "#left-leg", "scaleY", '0.91', { valueTemplate: undefined, fromValue: '0.95861'}], position: 1167, duration: 197, easing: "linear" },
            { id: "eid92", tween: [ "transform", "#left-leg", "scaleY", '1', { valueTemplate: undefined, fromValue: '0.91'}], position: 1364, duration: 135, easing: "linear" },
            { id: "eid101", tween: [ "transform", "#body", "rotateZ", '9deg', { valueTemplate: undefined, fromValue: '0deg'}], position: 946, duration: 221, easing: "linear" },
            { id: "eid102", tween: [ "transform", "#body", "rotateZ", '4deg', { valueTemplate: undefined, fromValue: '9deg'}], position: 1167, duration: 332, easing: "linear" },
            { id: "eid19", tween: [ "transform", "#body", "translateX", '245px', { valueTemplate: undefined, fromValue: '245px'}], position: 1500, duration: 0, easing: "easeOutBounce" },
            { id: "eid76", tween: [ "transform", "#right_arm", "rotateZ", '-36.787056552851deg', { valueTemplate: undefined, fromValue: '-52.99979deg'}], position: 0, duration: 557, easing: "swing" },
            { id: "eid118", tween: [ "transform", "#right_arm", "rotateZ", '-25.503658345865deg', { valueTemplate: undefined, fromValue: '-36.787056552851deg'}], position: 557, duration: 294, easing: "swing" },
            { id: "eid94", tween: [ "transform", "#right_arm", "rotateZ", '-35deg', { valueTemplate: undefined, fromValue: '-25.503658345865deg'}], position: 851, duration: 266, easing: "swing" },
            { id: "eid119", tween: [ "transform", "#right_arm", "rotateZ", '-25deg', { valueTemplate: undefined, fromValue: '-35deg'}], position: 1118, duration: 104, easing: "swing" },
            { id: "eid107", tween: [ "transform", "#right_arm", "rotateZ", '-31deg', { valueTemplate: undefined, fromValue: '-25deg'}], position: 1223, duration: 140, easing: "swing" },
            { id: "eid120", tween: [ "transform", "#right_arm", "rotateZ", '-11deg', { valueTemplate: undefined, fromValue: '-31deg'}], position: 1364, duration: 135, easing: "swing" },
            { id: "eid109", tween: [ "transform", "#right_arm", "rotateZ", '-55deg', { valueTemplate: undefined, fromValue: '-11deg'}], position: 1500, duration: 301, easing: "swing" },
            { id: "eid113", tween: [ "transform", "#right_arm", "rotateZ", '0deg', { valueTemplate: undefined, fromValue: '-55deg'}], position: 1801, duration: 272, easing: "linear" },
            { id: "eid33", tween: [ "transform", "#body", "translateY", '45px', { valueTemplate: undefined, fromValue: '-416px'}], position: 0, duration: 1500, easing: "easeOutBounce" },
            { id: "eid104", tween: [ "transform", "#left-leg", "rotateZ", '9deg', { valueTemplate: undefined, fromValue: '0deg'}], position: 800, duration: 366, easing: "linear" },
            { id: "eid105", tween: [ "transform", "#left-leg", "rotateZ", '4deg', { valueTemplate: undefined, fromValue: '9deg'}], position: 1167, duration: 332, easing: "linear" },
            { id: "eid41", tween: [ "transform", "#right_arm", "translateY", '111px', { valueTemplate: undefined, fromValue: '-350px'}], position: 0, duration: 1500, easing: "easeOutBounce" },
            { id: "eid13", tween: [ "style", "#stage", "width", '720px', { valueTemplate: undefined, fromValue: '720px'}], position: 0, duration: 0, easing: "linear" },
            { id: "eid25", tween: [ "transform", "#left-leg", "translateX", '219.44079px', { valueTemplate: undefined, fromValue: '217px'}], position: 1500, duration: 0, easing: "easeOutBounce" },
            { id: "eid88", tween: [ "transform", "#right_leg", "scaleY", '0.9', { valueTemplate: undefined, fromValue: '1'}], position: 800, duration: 287, easing: "linear" },
            { id: "eid86", tween: [ "transform", "#right_leg", "scaleY", '0.95861', { valueTemplate: undefined, fromValue: '0.9'}], position: 1088, duration: 78, easing: "linear" },
            { id: "eid100", tween: [ "transform", "#right_leg", "scaleY", '0.91', { valueTemplate: undefined, fromValue: '0.95861'}], position: 1167, duration: 197, easing: "linear" },
            { id: "eid82", tween: [ "transform", "#right_leg", "scaleY", '1', { valueTemplate: undefined, fromValue: '0.91'}], position: 1364, duration: 135, easing: "linear" },
            { id: "eid35", tween: [ "transform", "#right_leg", "translateY", '336.0523px', { valueTemplate: undefined, fromValue: '-122px'}], position: 0, duration: 1500, easing: "easeOutBounce" },
            { id: "eid21", tween: [ "transform", "#right_arm", "translateX", '426px', { valueTemplate: undefined, fromValue: '426px'}], position: 1500, duration: 0, easing: "easeOutBounce" }]
      }
   }
}};

/**
 * Adobe Edge DOM Ready Event Handler
 */
$(window).ready(function() {
     $.Edge.initialize(symbols);
});
/**
 * Adobe Edge Timeline Launch
 */
$.Edge.ready(function() {
    $.Edge.play();
});
