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

Data <- ReadAffy()

#RMA
rma <- rma(Data)
#rma2 <- justRMA() kombi mit readaffy und rma
rm <- (exprs(rma))

#MAS
mas5 <- mas5(Data)
mas <- log2(exprs(mas5))



setwd("..")

setwd("output")

#Raw:

png(filename="qualitycontrol.png")
plot.qc.stats(qc(Data))
title(main="Quality Control")

dev.next()

png(filename="RNA_Degradation_Plot.png")
deg <- AffyRNAdeg(Data)
plotAffyRNAdeg(deg, col=1:N)
legend("topright", substr(sampleNames(Data),1,20), lwd=3, lt = 1:length(sampleNames(Data)),
       col = 1:N,cex=0.5, bty = "n") 

dev.next()

png(filename="heatspearman.png")
aheatmap(cor(exprs(Data), method = "spearman")) #mit Legende
title(main="Heatmap Spearman")

dev.next()

png(filename="heatpearson.png")
aheatmap(cor(exprs(Data), method = "pearson")) #mit Legende
title(main="Heatmap Pearson")

dev.next()

png(filename="Rohcluster.png")
dat <- exprs(Data)
d <- dist(t(dat))
hc <- hclust(d, method = "complete")
plot(hc)

dev.next()

source("../../../functions_imagesQC.R")

pcaFun(Data,experimentFactor = N,plotColors = 1:N, legendColors = 1:N, plotSymbols = 1:N, legendSymbols = 1:N)

dev.next()


for (i in 1:N) {
  
  png(filename= paste("chipimage",i,".png"))
  image(Data[,i],col=heat.colors(100))
  dev.next()
}

dev.next()

png(filename="hist.png")
hist(Data[,1:N],col=1:N)
legend("topright", substr(sampleNames(Data),1,20), lwd=3, lt = 1:length(sampleNames(Data)),
       col = 1:N,cex=0.7, bty = "n")           
title(main="Signalwerte Histogramm")

dev.next()

#RMA:

png(filename="rmaheatspearman.png", pointsize = 10, width = 500, height = 500)
aheatmap(cor(rm, method = "spearman")) #mit Legende
title(main="Heatmap Spearman")

dev.next()

png(filename="rmaheatpearson.png")
aheatmap(cor(rm, method = "pearson")) #mit Legende
title(main="Heatmap Pearson")

dev.next()

png(filename="rmacluster.png")
d <- dist(t(rm))
hc <- hclust(d, method = "complete")
plot(hc)

dev.next()

png(filename="rmahist.png")
plot(density(rm[,1]))
for (i in 2:N){
  points(density(rm[,i]), type = 'l', col=i)
  legend("topright", substr(sampleNames(Data),1,20), lwd=3,
         col = 1:N,cex=0.5, bty = "n") 
}

dev.next()

#MAS 5:

png(filename="masheatspearman.png")
aheatmap(cor(mas, method = "spearman")) #mit Legende
title(main="Heatmap Spearman")

dev.next()

png(filename="masheatpearson.png")
aheatmap(cor(mas, method = "pearson")) #mit Legende
title(main="Heatmap Pearson")

dev.next()

png(filename="mascluster.png")
a <- dist(t(mas))
hc2 <- hclust(a, method = "complete")
plot(hc2)

dev.next()

png(filename="mashist.png")
plot(density(mas[,1]))
for (i in 2:N){
  points(density(mas[,i]), type = 'l', col=i)
  legend("topright", substr(sampleNames(Data),1,20), lwd=3,
         col = 1:N,cex=0.5, bty = "n") 
}

dev.off()

write.table(dat, "affymetrix_raw.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

write.table(rm, "affymetrix_rma.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)

write.table(mas, "affymetrix_mas5.txt", 
            sep="\t", row.names=T, col.names=T, quote=F)


