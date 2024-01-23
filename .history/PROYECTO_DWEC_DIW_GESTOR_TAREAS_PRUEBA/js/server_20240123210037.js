const EXPRESS = require("express");
const APP = EXPRESS();
const PORT = 3000;

APP.use(EXPRESS.urlencoded());

APP.use("/"), (req, res) => {
    res.
};

APP.listen(PORT, () => {
    console.log(`Server running on htpp://localhost:${PORT}`);
});