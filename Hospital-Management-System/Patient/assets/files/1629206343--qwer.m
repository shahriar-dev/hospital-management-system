close all;
clc;

%ID: 19-39293-1


%Define number of samples to take
A = 1;
B = 9;
C = 3;
D = 9;
E = 2;
F = 9;
G = 3;
H = 1;
A1 = 19;
A2 = 19;
s = .11;

fs = 1000; % Sampling frequency

%Define signal
t = 0:1/fs:1-1/fs;

powfund = A1^2/2;

varnoise = s^2;

x = A1*sin(2*pi*(C*50)*t) + A2*cos(2*pi*(G*100)*t) + s*randn(size(t));

defSNR = 10*log10(powfund/varnoise) %Calculation of SNR following the definition
