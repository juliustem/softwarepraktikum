#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/30-03-17_04-16-01/input")

args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
#library(cluster)
#library(genefilter)
library(affy)
#library(affycomp)
library(affydata)
library(affyio)
library(simpleaffy)
#library(sm)
#library(BH)
#library(bioDist)
#library(MVA)
#library(qcc)
#library(made4)
#library(ade4)

Data2 <- ReadAffy()

setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery")

setwd(O)
png(filename="hist.png")
hist(Data2[,1:N],col=1:N)
legend("topright", substr(sampleNames(Data2),1,20), lwd=3, lt = 1:length(sampleNames(Data2)),
       col = 1:N,cex=0.7, bty = "n")           
+title(main="Signalwerte HISTOGRAMM")


dev.off()


