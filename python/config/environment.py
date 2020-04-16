from dotenv import load_dotenv
from os.path import join, dirname
import os

load_dotenv(verbose=True)

dotenv_path = join(dirname(__file__), '.env')
load_dotenv(dotenv_path)

CONNECTION = os.environ.get("CONNECTION")
HOST = os.environ.get("HOST")
PORT = os.environ.get("PORT")
DATABASE = os.environ.get("DATABASE")
USERNAME = os.environ.get("USERNAME")
PASSWORD = os.environ.get("PASSWORD")
