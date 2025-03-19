const Web3 = require('web3');
const web3 = new Web3('http://127.0.0.1:7545'); // Ensure Ganache is running

const contractABI = require('./contractABI.json'); // Ensure ABI is accurate
const contractAddress = '0xYourContractAddress';
const account = '0xYourAccountAddress';

const contract = new web3.eth.Contract(contractABI, contractAddress);

async function logToBlockchain(plate, name, vehicleType) {
    try {
        const receipt = await contract.methods.addLog(plate, name, vehicleType).send({ from: account });
        console.log('Log stored on blockchain:', receipt.transactionHash);
    } catch (error) {
        console.error('Blockchain error:', error);
    }
}

// Receive data from PHP
const args = process.argv.slice(2);
if (args.length === 3) {
    logToBlockchain(args[0], args[1], args[2]);
}
