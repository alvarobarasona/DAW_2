const EXPRESS = require("express");
const APP = EXPRESS();
const PORT = 3000;

APP.use("/"), () => {};

APP.listen(PORT, () => {
    console.log(`Server running on htpp://localhost:${PORT}`);
});