const EXPRESS = require("express");
const FS = require("fs");
const APP = EXPRESS();
const PORT = 3000;

APP.listen(PORT, () => {
    console.log(`Server running on htpp://localhost:${PORT}`);
});