@echo off
title Start Streaming & License Plate Recognition
echo [INFO] Starting HLS Streams...

:: Start FFmpeg for Camera 1
start "" ffmpeg -i "rtsp://192.168.118.242:8080/h264.sdp" -c:v copy -an -f hls -hls_time 2 -hls_list_size 5 -hls_flags delete_segments+append_list "C:\xampp\htdocs\CC106\hls\stream.m3u8"

:: Start FFmpeg for Camera 2
start "" ffmpeg -i "rtsp://192.168.118.202:8080/h264.sdp" -c:v copy -an -f hls -hls_time 2 -hls_list_size 5 -hls_flags delete_segments+append_list "C:\xampp\htdocs\CC106\hls2\stream2.m3u8"

timeout /t 5 >nul  :: Wait for 5 seconds to ensure FFmpeg starts properly

echo [INFO] Starting License Plate Recognition...
start python "C:\xampp\htdocs\CC106\license_plate_recognition.py"

echo [INFO] All processes started successfully!
pause

