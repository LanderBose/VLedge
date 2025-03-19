// SPDX-License-Identifier: MIT
pragma solidity >=0.4.22 <0.9.0;

contract VehicleLog {
    struct VehicleEntry {
        string plateNumber;
        string ownerName;
        string vehicleType;
        uint256 entryTime;
        uint256 exitTime;
    }

    mapping(bytes32 => VehicleEntry) private vehicleLogs;

    event VehicleEntered(string plateNumber, string ownerName, string vehicleType, uint256 entryTime);
    event VehicleExited(string plateNumber, uint256 exitTime);

    // Helper function to convert string to bytes32
    function toBytes32(string memory source) internal pure returns (bytes32 result) {
        bytes memory temp = bytes(source);
        if (temp.length == 0) {
            return 0x0;
        }
        assembly {
            result := mload(add(source, 32))
        }
    }

    // Log vehicle entry
    function logEntry(string memory _plateNumber, string memory _ownerName, string memory _vehicleType) public {
        bytes32 plateHash = toBytes32(_plateNumber);
        
        require(bytes(vehicleLogs[plateHash].plateNumber).length == 0, "Vehicle already entered.");

        vehicleLogs[plateHash] = VehicleEntry({
            plateNumber: _plateNumber,
            ownerName: _ownerName,
            vehicleType: _vehicleType,
            entryTime: block.timestamp,
            exitTime: 0
        });

        emit VehicleEntered(_plateNumber, _ownerName, _vehicleType, block.timestamp);
    }

    // Log vehicle exit
    function logExit(string memory _plateNumber) public {
        bytes32 plateHash = toBytes32(_plateNumber);
        
        require(bytes(vehicleLogs[plateHash].plateNumber).length > 0, "Vehicle not found.");
        require(vehicleLogs[plateHash].exitTime == 0, "Vehicle already exited.");

        vehicleLogs[plateHash].exitTime = block.timestamp;

        emit VehicleExited(_plateNumber, block.timestamp);
    }

    // Get vehicle log by plate number
    function getVehicleLog(string memory _plateNumber) public view returns (
        string memory, string memory, string memory, uint256, uint256
    ) {
        bytes32 plateHash = toBytes32(_plateNumber);
        VehicleEntry memory log = vehicleLogs[plateHash];
        
        require(bytes(log.plateNumber).length > 0, "Vehicle not found.");
        
        return (log.plateNumber, log.ownerName, log.vehicleType, log.entryTime, log.exitTime);
    }
}
