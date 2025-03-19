const Web3 = require('web3');
const contract = require('./build/contracts/VehicleLog.json');

const web3 = new Web3('http://127.0.0.1:7545'); // Ganache URL
const contractAddress = '0xbc419269834d3773F34a42Ba83F7974B458B94a9';
const vehicleLog = new web3.eth.Contract(contract.abi, contractAddress);

const args = process.argv.slice(2);
const [plateNumber, ownerName, vehicleType] = args;

const account = '0x2489e2fca65f45499A99561BBEe0735f8A5025b0'; // From Ganache

async function logEntry() {
    try {
        await vehicleLog.methods.logEntry(plateNumber, ownerName, vehicleType).send({ from: account });
        console.log("Log added to blockchain");
    } catch (error) {
        console.error("Error:", error);
    }
}

logEntry();
