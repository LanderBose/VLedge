import os
import time
import subprocess

# Define HLS streams and image paths
streams = {
    "camera1": {
        "hls_url": "http://localhost/CC106/hls/stream.m3u8",
        "image_path": "C:\\xampp\\htdocs\\CC106\\captures\\plate1.jpg"
    },
    "camera2": {
        "hls_url": "http://localhost/CC106/hls2/stream.m3u8",
        "image_path": "C:\\xampp\\htdocs\\CC106\\captures\\plate2.jpg"
    }
}

while True:
    for cam, data in streams.items():
        print(f"\n[INFO] Capturing frame from {cam}...")

        # Capture a frame from the HLS stream (suppress console logs)
        capture_command = f'ffmpeg -i "{data["hls_url"]}" -vframes 1 -q:v 2 -y "{data["image_path"]}"'
        subprocess.run(capture_command, shell=True, stdout=subprocess.DEVNULL, stderr=subprocess.DEVNULL)

        # Check if the image was saved and is not empty
        if os.path.exists(data["image_path"]) and os.path.getsize(data["image_path"]) > 1000:
            print(f"[INFO] Running OpenALPR on {cam} frame...")

            # Run OpenALPR and get output
            alpr_command = f'alpr -c ph "{data["image_path"]}"'
            result = subprocess.getoutput(alpr_command)

            # Print the recognition result
            print(f"[RESULT] {cam}:\n{result}")

        else:
            print(f"[ERROR] Image capture failed for {cam}! (Check stream)")

    # Wait 2 seconds before capturing again
    time.sleep(2)
