const VehicleLog = artifacts.require("VehicleLog");

module.exports = function (deployer) {
    deployer.deploy(VehicleLog);
};