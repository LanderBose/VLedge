const {Web3} = require('web3');
const fs = require('fs');
const path = require('path');

// Connect to Ganache
const web3 = new Web3(new Web3.providers.HttpProvider("http://127.0.0.1:7545"));

// Load the contract ABI and address
const contractPath = path.join(__dirname, '../build/contracts/VehicleLog.json');
const contractJson = JSON.parse(fs.readFileSync(contractPath, 'utf8'));

const contractAddress = "0x6fca09e6755F6b5Ce47a1Ef61Cbb5477082aBFe5"; // Replace this
const vehicleLog = new web3.eth.Contract(contractJson.abi, contractAddress);

// Helper function to log a vehicle entry
async function logEntry(plateNumber, ownerName, vehicleType) {
    try {
        const accounts = await web3.eth.getAccounts();
        const sender = accounts[0];

        const result = await vehicleLog.methods.logEntry(plateNumber, ownerName, vehicleType)
            .send({ from: sender });

        console.log("✅ Vehicle entry logged:", result.transactionHash);
    } catch (error) {
        console.error("❌ Error logging vehicle entry:", error);
    }
}

// Helper function to log a vehicle exit
async function logExit(plateNumber) {
    try {
        const accounts = await web3.eth.getAccounts();
        const sender = accounts[0];

        const result = await vehicleLog.methods.logExit(plateNumber)
            .send({ from: sender });

        console.log("✅ Vehicle exit logged:", result.transactionHash);
    } catch (error) {
        console.error("❌ Error logging vehicle exit:", error);
    }
}

// Read input from command line
const [action, plateNumber, ownerName, vehicleType] = process.argv.slice(2);

if (action === "entry") {
    logEntry(plateNumber, ownerName, vehicleType);
} else if (action === "exit") {
    logExit(plateNumber);
} else {
    console.error("❌ Invalid action. Use 'entry' or 'exit'.");
}