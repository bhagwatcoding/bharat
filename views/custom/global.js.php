<?php Head::con('.js'); ?>
const log = (a) => console.log(a);
const table = (a) => console.table(a);
const warn = (a) => console.warn(a);
const cls = (e) => document.getElementsByClassName(e);
const id = (e) => document.getElementById(e);
const tgn = (e) => document.getElementsByTagName(e);
const n = (e) => document.getElementsByName(e);
const qs = (e) => document.querySelector(e);
const qsa = (e) => document.querySelectorAll(e);
const qsc = (a, b) => a.querySelector(b);
const qsac = (a, b) => a.querySelectorAll(b);
const insert = (a, b, c) => a.insertBefore(b, a.children[c]);
const create = (e = "div") => document.createElement(e);
const txtNode = (a = '') => document.createTextNode(a);
const set = (a, b, c) => a.setAttribute(b, c);
const on = (a,b,f) => b.addEventListener(a, f);
const Toogle = (a, b) => a.classList.toggle(b);
