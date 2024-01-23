@charset "UTF-8";
@import url("https://fonts.googleapis.com/css2?family=PT+Sans&display=swap");
body {
  display: flex;
  flex-direction: column;
  background-color: #001F3F;
  margin: 0;
  font-family: 'PT Sans', sans-serif;
  color: white; }

header {
  background-color: #0074D9;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 10px; }

h1 {
  margin: 0; }

main {
  display: flex;
  flex-direction: column;
  gap: 10px;
  padding: 10px; }

form {
  background-color: #0074D9;
  padding: 10px;
  border-radius: 8px;
  display: flex;
  gap: 10px; }

#input-container {
  display: flex;
  gap: 10px;
  width: 100%; }

input {
  display: flex;
  flex-grow: 1; }

button {
  color: white;
  background-color: #001F3F; }

#tasks-container {
  display: flex;
  justify-content: space-between;
  gap: 10px; }

h2 {
  margin: 0; }

#no-iniciated {
  display: flex;
  justify-content: center;
  padding: 10px;
  width: 90%;
  border-radius: 8px;
  background-color: #000925; }

#iniciated {
  display: flex;
  justify-content: center;
  padding: 10px;
  width: 90%;
  border-radius: 8px;
  background-color: #0074D9; }

#finalizated {
  display: flex;
  justify-content: center;
  padding: 10px;
  width: 90%;
  border-radius: 8px;
  background-color: #7FDBFF; }

footer {
  background-color: #000925;
  position: fixed;
  bottom: 0;
  width: 100%;
  padding: 30px;
  display: flex;
  justify-content: center; }

/*
Azul Oscuro: #001F3F
Azul Medio: #0074D9
Azul Claro: #7FDBFF
Azul Turquesa: #39CCCC
Azul Marino: #001f3f
Azul Grisáceo: #8499a5
*/

/*# sourceMappingURL=style.c.map */