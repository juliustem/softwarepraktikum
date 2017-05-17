args <- commandArgs(TRUE)
R <- args[1]
N <- args[2]
Z <- args[3]

library(dplyr)

V <- strtoi(N)

setwd(Z)

tab <- read.table("FC_SLR_rma.txt", header = TRUE, row.names=NULL)
names(tab)[names(tab)=="row.names"] <- "GeneID"

if(R=="<="){
  temptab <- dplyr::filter(tab,SLR<=(V))
  sorttab <- temptab[order(temptab$SLR, decreasing = TRUE), ]
  s <- paste0("SLR_<=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="<"){
  temptab <- dplyr::filter(tab,SLR<(V))
  sorttab <- temptab[order(temptab$SLR, decreasing = TRUE), ]
  s <- paste0("SLR_<",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">="){
  temptab <- dplyr::filter(tab,SLR>=(V))
  sorttab <- temptab[order(temptab$SLR, decreasing = TRUE), ]
  s <- paste0("SLR_>=",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R==">"){
  temptab <- dplyr::filter(tab,SLR>(V))
  sorttab <- temptab[order(temptab$SLR, decreasing = TRUE), ]
  s <- paste0("SLR_>",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}
#setwd("/Applications/XAMPP/xamppfiles/htdocs/Softwarepraktikum/jquery/upload/17-05-17_12-28-13/output")

if(R=="max"){
  temptab <- dplyr::top_n(tab,10,SLR)
  sorttab <- temptab[order(temptab$SLR, decreasing = TRUE), ]
  s <- paste0("SLR_max_Top",10,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

if(R=="min"){
  temptab <- tab[order(tab$SLR), ]
  sorttab <- temptab[1:V,]
  s <- paste0("SLR_min_Top",V,"_RMA.txt")
  write.table(sorttab, s, sep="\t", row.names=T, col.names=T, quote=F)
}

