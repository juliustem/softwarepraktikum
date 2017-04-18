args <- commandArgs(TRUE)
N <- args[1]
P <- args[2]
O <- args[3]


setwd(P)

library(Biobase)
library(BiocGenerics)
library(BiocInstaller)
library(cluster)
library(genefilter)
library(affy)
#library(affycomp)
library(affydata)
library(affyio)
library(simpleaffy)
library(sm)
#library(BH)
library(bioDist)
#library(MVA)
library(qcc)
#library(made4)
#library(ade4)
library(NMF)
library(hugene20sttranscriptcluster.db)

Data2 <- ReadAffy()

setwd("..")

setwd("output")


png(filename="qualitycontrol.png")
plot.qc.stats(qc(Data2))
title(main="Quality Control")

dev.next()

png(filename="RNA_Degradation_Plot.png")
deg <- AffyRNAdeg(Data2)
plotAffyRNAdeg(deg, col=1:N)
legend("topright", substr(sampleNames(Data2),1,20), lwd=3, lt = 1:length(sampleNames(Data2)),
       col = 1:N,cex=0.5, bty = "n") 

dev.next()

png(filename="heatspearman.png")
aheatmap(cor(exprs(Data2), method = "spearman")) #mit Legende
title(main="Heatmap Spearman")

dev.next()

png(filename="heatpearson.png")
aheatmap(cor(exprs(Data2), method = "pearson")) #mit Legende
title(main="Heatmap Pearson")

dev.next()

png(filename="Rohcluster.png")
dat <- exprs(Data2)
d <- dist(t(dat))
hc <- hclust(d, method = "complete")
plot(hc)

dev.next()

source("../../../functions_imagesQC.R")

pcaFun(Data2,experimentFactor = 3,plotColors = 1:4, legendColors = 1:2, plotSymbols = 1:3, legendSymbols = 1:3)

dev.next()


for (i in 1:N) {
  
  png(filename= paste("chipimage",i,".png"))
  image(Data2[,i],col=heat.colors(100))
  dev.next()
}

dev.next()

png(filename="hist.png")
hist(Data2[,1:N],col=1:N)
legend("topright", substr(sampleNames(Data2),1,20), lwd=3, lt = 1:length(sampleNames(Data2)),
       col = 1:N,cex=0.7, bty = "n")           
title(main="Signalwerte Histogramm")


dev.off()

write.table(dat, "affymetrix_raw.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

