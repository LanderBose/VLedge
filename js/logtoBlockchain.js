const { Web3 } = require('web3');
const fs = require('fs');
const path = require('path');

// Connect to Ganache
const web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:7545"));

// Load contract ABI and address
const contractPath = path.join(__dirname, '../build/contracts/VehicleLog.json');
const contractJson = JSON.parse(fs.readFileSync(contractPath, 'utf8'));

const contractAddress = "0xb9954e7eE9bA708D7619030d98e182e23f2613cf"; // Replace with actual address
const vehicleLog = new web3.eth.Contract(contractJson.abi, contractAddress);

// Function to log vehicle entry
async function logVehicle(logId, plateNumber, fullName, registrationType, date, timestamp) {
    try {
        const accounts = await web3.eth.getAccounts();
        const sender = accounts[0];

        const result = await vehicleLog.methods.logVehicle(logId, plateNumber, fullName, registrationType, date, timestamp)
            .send({ from: sender });

        console.log("✅ Vehicle log recorded:", result.transactionHash);
    } catch (error) {
        console.error("❌ Error logging vehicle:", error);
    }
}

// Read input from PHP command
const [logId, plateNumber, fullName, registrationType, date, timestamp] = process.argv.slice(2);

if (logId && plateNumber && fullName && registrationType && date && timestamp) {
    logVehicle(logId, plateNumber, fullName, registrationType, date, timestamp);
} else {
    console.error("❌ Invalid input. Ensure all parameters are provided.");
}
