const EXPRESS = require("express");
const APP = EXPRESS();
const PORT = 3000;

APP.use(EXPRESS.urlencoded({extended: true}));

APP.get("/"), (req, res) => {
    res.sendFil
};

APP.listen(PORT, () => {
    console.log(`Server running on htpp://localhost:${PORT}`);
});