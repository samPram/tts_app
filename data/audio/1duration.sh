OUTPUT="$(for i in *wav; do soxi -D $i; done)";
echo "${OUTPUT}"

## get total number of seconds of WAVs in dir
TOTAL_SECS=0
for i in *wav; do      
    SECS="$(soxi -D $i)"
    TOTAL_SECS=$(echo "$TOTAL_SECS + $SECS" | bc)
    done
printf "\n\nThere are a total of ${TOTAL_SECS}
       seconds of WAV files in the dir\n\n"
