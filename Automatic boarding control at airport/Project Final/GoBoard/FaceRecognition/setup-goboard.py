from cx_Freeze import setup , Executable

setup(name = "GoBoard",
    version = "0.1",
    description = "You can generate boarding pass from face recognition",
    executables = [Executable(r"D:\OpenCV Tutorial\FaceRecognition\GenerateBoardingPass.py")]
      )