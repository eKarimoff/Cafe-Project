<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<style>
    html, body {
margin:0;
padding:0;
font-family:sans-serif;
/* background: linear-gradient(120deg, powderblue 30%, transparent); */
}

.sidebar {
width:max(150px, 10vw);
background:rgb(240, 243, 243);
/* height:100vh; */
} 

.sidebar .side-header {
text-indent: 70px;
padding:1em 4em 1em 0em;
width:max-content;
background-repeat:no-repeat;
background-position:right center;
background-size:auto 90%;
}

.side-header h1,.side-header p {
margin:0;
color:white;
}

.side-header p {
text-align:right;
}


.sidenav {
display:flex;
flex-direction:column;
width:100%;
height:80%;
position:relative;
margin-top: 0.3em;
}

.sidenav .button-container {
width: 100%;
display: contents;
}

.sidenav .button {
padding:1em;
position:relative;
z-index:2;
display:flex;
align-items: center;
gap:0.2em;
}

.button:nth-child(10) {
margin-top:auto;
}

.sidenav .checkbox {
position:absolute;
z-index:-1;
}

.slide {
padding:1.74em 0;
background:rgb(252, 249, 249);
width:100%;
position:absolute;
top:0;
z-index:1;
opacity:0.5;
transition:all 0.5s;
  background: linear-gradient(45deg, lightgrey, transparent);
  box-sizing: border-box;
border-left: solid 0.5em while;
transition-timing-function: cubic-bezier(0, 1.04, 0, 1.14);
}

[id="0"]:checked ~ .slide {
--step-:0;
}
[id="1"]:checked ~ .slide {
--step-:1;
}
[id="2"]:checked ~ .slide {
--step-:2;
}
[id="3"]:checked ~ .slide {
--step-:3;
}
[id="4"]:checked ~ .slide {
top:calc(100% - 3.55em);
}

.sidenav .checkbox:checked ~ .slide {
transform: translateY(calc(var(--step-) * 100%));
}
.content {
display: flex;
background-color:white;
}
.main {
width: 100%
}
a{
    text-decoration: none;
    color: black
}

</style>